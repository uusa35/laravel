/*
var Person = function (config) {
    this.name = config.name;
    this.age = config.age;
    this.occuption = config.occuption;
};

Person.prototype.work = function () {
    return this.name + 'is working :: ' + this.occuption;
}  */


/*
var Person = Backbone.Model.extend({
    defaults : {
        'name'      : 'usama',
        'age'       : 31,
        'job'       : 'web developer'
    },
    validate : function (attrs) {

    },

    work : function () {
        return this.get('name') + "working as " + this.get('occuption ');
    }
});

var PeopleCollection = Backbone.Collection.extend({
    model : Person
});

var PersonView = Backbone.View.extend({
    tagName     : 'li',
    template    : _.template($('#personTemplate').html()),
    initialize  : function () {
        this.render();
    },
    render      : function () {
                this.$el.html(this.template(this.model.toJSON()));
    }
});

var PeopleView = Backbone.View.extend({

    tagName     : 'ul',
    initialize  : function () {

    },
    render      : function () {

        this.collection.each(function (person) {
            console.log(this);
            var personView = new PersonView({ model : person});
            this.$el.append(personView.el);
        },this);
    }
});

// instance of PeopleCollection
var peopleCollection = new PeopleCollection([
    {
        name    : 'usama ahmed',
        age     : 31,
        job     : 'Web Developer'
    },
    {
        name    : 'Mahmood Ahmed',
        age     : 27,
        job     : 'Secretary'
    },
    {
        name    : 'Amro',
        age     : 44,
        job     : 'Web Designer'
    }
]);


// instance of PeopleView
var peopleView = new PeopleView({ collection : peopleCollection});

*/
/*var person = new Person();
var personView = new PersonView({ model : person});
var person2 = new Person({name: 'mahmood',age:28,job:'secretary'});
var personView2 = new PersonView({ model : person2});*//*



//console.log(peopleCollection.toJSON());*/


(function () {
    window.App = {
        Models      : {},
        Collections : {},
        Views       : {},
        Router      : {},
        Events      : {}
    };

    App.Models.Article = Backbone.Model.extend({
        defaults : {
            title         : '',
            author        : '',
            body          : '',
            category_id   : '',
            created_at    : '',
            updated_at    : ''
        },
        urlRoot : '/api/articles'
    });

    App.Collections.Articles = Backbone.Model.extend({
        model   : App.Models.Article,
        url     : '/api/articles'
    });




    // instance
    var article = new App.Models.Article({id : 5});
    article.fetch({
        success   : function () {
            console.log('success from the article Model Method');
        }
    });
    var articles = new App.Collections.Articles();
    var TestArticles = articles.fetch({
        success   : function () {

        }
    });

    $('.test').on('click', function (TestArticle) {
        console.log('Click Event Fired');
        var title = prompt('Please Put a Value for the title');
        article.set('title',title);
        article.save({
            success     : function (msg) {
                console.log(msg);
            }
        });
    });

})();