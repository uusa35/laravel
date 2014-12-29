/**
 * Created by usama_000 on 12/22/2014.
 */


    /*URL Prefix*/
$.ajaxPrefilter(function (options,originalOptions, jqXHR) {
    options.url = '/api' + options.url;
});
/* jquery Serialize Object */
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
/*Collection*/
var ArticlesCollection = Backbone.Collection.extend({
    'url'   : '/articles'
});
// Model
var ArticleModel = Backbone.Model.extend({
    'urlRoot'       : '/articles',
    'idAttribute'   : 'id'
});
/*Routes*/
var Router = Backbone.Router.extend({
    routes: {
        // URL      : Route Name
        ''          : 'home',
        'new'       : 'editArticle',
        'edit/:id'  : 'editArticle'
    }
});
// Instance of Application Route
var router = new Router();

// Instance of Collection -- AllArticles
var articles = new ArticlesCollection();


/*Views*/
// All Articles View
var ArticlesListView = Backbone.View.extend({
    el      : '.page',
    render  : function () {
        var that = this;
        articles.fetch({
            'error' :   function () {alert('error')},
            'success' :  function (articles) {
                var template = _.template($('#articles-template').html(),{articles: articles.models});
                that.$el.html(template);
            }
        });
    }
});
// Create New User Form View + Edit User
var CreateNewArticleView = Backbone.View.extend({
    el      : '.page',
    render  : function (options) {
        var that = this;

        if(options.id) {
            articleItem = new ArticleModel({id:options.id});
            articleItem.fetch({
                'error' :   function () {alert('error')},
                'success' :  function (articleItem) {
                    var template = _.template($('#create-new-article-template').html(),{articleItem: articleItem});
                    that.$el.html(template);
                }
            });
        }
        else {
            articleItem = null;
            var template = _.template($('#create-new-article-template').html(),{articleItem: null});
            that.$el.html(template);

        }
    },
    events  : {
        'submit .create-article-form'   : 'storeArticle',
        'submit .edit-article-form'     : 'updateArticle'
    },
    storeArticle : function (event) {
        console.log('from inside the store method');
        var ArticleDetails = $(event.currentTarget).serializeObject();
        var NewArticle = new ArticleModel();
        NewArticle.save({data:ArticleDetails}, {
            'success'   : function () {
                router.navigate('',{trigger:true});
            }
        });
        return false;
    },
    updateArticle   : function (event) {
        var ArticleDetails = $(event.currentTarget).serializeObject();
        console.log('id '+ArticleDetails.id);
        var NewArticle = new ArticleModel({id:ArticleDetails.id});

        NewArticle.save({data:ArticleDetails},{
            'success'   : function () {
                router.navigate('',{trigger:true});
            }
        });
        return false;
    }

});
// show Article View
var ShowArticleView = Backbone.View.extend({
    el      : '.page',
    render  : function (options) {
        var template = _.template($('#show-article-template').html(),{});
    }
});
// Views Instances
var ArticleListViewInstance = new ArticlesListView();
var CreateNewArticleInstance = new CreateNewArticleView();
router.on('route:home', function () {
    ArticleListViewInstance.render();
});
router.on('route:editArticle', function (id) {
    CreateNewArticleInstance.render({id: id});
});

Backbone.history.start();




