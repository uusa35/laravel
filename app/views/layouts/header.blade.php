<meta charset="UTF-8" xmlns="http://www.w3.org/1999/html">
<title>Usama Blog System with CMS</title>
{{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}
@if(Session::get('locale') == 'ar')
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css") }}
    <style type="text/css">
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.eot");
        }
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.ttf");
        }


        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'jarida' !important;
        }
    </style>
@else
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <style type="text/css">
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.eot");
        }
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.ttf");
        }
        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'Oswald', 'jarida' ;
        }
    </style>
@endif
{{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}
@section('header')
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js") }}
@stop
@section('footer')
    {{--all-articles--}}
    <script type="text/template" id="articles-template">
        <h4>All Articles</h4>
        <a href="#/new" class="btn btn-success">create user</a>
        <table class="table striped">
            <thead>
            <tr>
                <th>id</th>
                <th>author</th>
                <th>title</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
            </tr>
            <tbody>
            <% articles.each(function(article) { %>
                <% for (i=0;i< article.attributes.data.length;i++) {%>
                    <tr>
                        <td><%= article.attributes.data[i].id %></td>
                        <td><%= article.attributes.data[i].author %></td>
                        <td><a href="#/show/<%= article.attributes.data[i].id %>"><%= article.attributes.data[i].title %></a></td>
                        <td><%= article.attributes.data[i].created_at %></td>
                        <td><%= article.attributes.data[i].updated_at %></td>
                        <td><a href="#/edit/<%= article.attributes.data[i].id %>" class="btn btn-warning" role="button">edit</a> </td>
                    </tr>
                <% } %>
            <% }); %>
            </tbody>
            </thead>
        </table>
    </script>
    {{--show article--}}
    <script type="text/template" id="show-articles-template">
        <h4>All Articles</h4>
        <a href="#/new" class="btn btn-success">create user</a>
        <table class="table striped">
            <thead>
            <tr>
                <th>id</th>
                <th>author</th>
                <th>title</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
            </tr>
            <tbody>
            <% articles.each(function(article) { %>
            <% for (i=0;i< article.attributes.data.length;i++) {%>
            <tr>
                <td><%= article.attributes.data[i].id %></td>
                <td><%= article.attributes.data[i].author %></td>
                <td><a href="#/show/<%= article.attributes.data[i].id %>"><%= article.attributes.data[i].title %></a></td>
                <td><%= article.attributes.data[i].created_at %></td>
                <td><%= article.attributes.data[i].updated_at %></td>
                <td><a href="#/edit/<%= article.attributes.data[i].id %>" class="btn btn-warning" role="button">edit</a> </td>
            </tr>
            <% } %>
            <% }); %>
            </tbody>
            </thead>
        </table>
    </script>
    <script type="text/template" id="create-new-article-template">
        <legend><%= article ? 'Update' : 'Create' %>Article</legend>
        <form action="#" role="form" class="edit-article-form col-md-7">
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="category_id">category</label>
                <input type="number" max="10" min="0" name="category_id" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="body">body</label>
                <textarea name="body" class="form-control" rows="5"/></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </script>
    <script type="text/template" id="show-article-template">

    </script>
    <script>
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
            'urlRoot'   : '/articles'
        });
        /*Routes*/
        var Router = Backbone.Router.extend({
            routes: {
                // URL      : Route Name
                '': 'home',
                'new': 'editArticle',
                'edit/:id': 'editArticle'
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
                            var article = new ArticleModel({id:options.id});
                            article.fetch({
                                'error' :   function () {alert('error')},
                                'success' :  function (article) {
                                    var template = _.template($('#create-new-article-template').html(),{article: article});
                                    that.$el.html(template);
                                }
                            });
                        }
                        else {
                        var template = _.template($('#create-new-article-template').html(),{article: null});
                        this.$el.html(template);
                        }
                    },
            events  : {
                'submit .edit-article-form' : 'saveArticle'
            },
            saveArticle : function (event) {
                var ArticleDetails = $(event.currentTarget).serializeObject();
                var NewArticle = new ArticleModel();
                NewArticle.save({'data':ArticleDetails}, {
                    'success'   : function () {
                        console.log(NewArticle.toJSON());
                        router.navigate('',{trigger:true});
                    }
                });
                /*console.log(ArticleDetails);*/
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
    </script>
@stop
