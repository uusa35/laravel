<meta charset="UTF-8">
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

@stop
@section('footer')
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js") }}
    <script type="text/template" id="articles-template">
        <h4>All Articles</h4>
        <table class="table striped">
            <thead>
            <tr>
                <th>id</th>
                <th>author</th>
                <th>title</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            <tbody>
            <% _.each(articles, function (article) { %>
            <tr>
                <td><%= article.get('id') %></td>
                <td><%= article.get('author') %></td>
                <td><%= article.get('title') %></td>
                <td><%= article.get('created_at') %></td>
                <td><%= article.get('updated_at') %></td>
            </tr>
            <% }); %>
            </tbody>
            </thead>
        </table>
    </script>
    <script>
        /*URL Prefix*/
        $.ajaxPrefilter(function (options,originalOptions, jqXHR) {
            options.url = 'http://projects-usama-ahmed.tk/api' + options.url;
        });
        /*Collection*/
        var ArticlesCollection = Backbone.Collection.extend({
            'url'   : '/articles'
        });
        /*Routes*/
        var Router = Backbone.Router.extend({
            routes: {
                ''          : 'home'
            }
        });
        var router = new Router();
        /*Views*/
        var ArticlesListView = Backbone.View.extend({
            render  : function () {
                var that = this;
                var articles = new ArticlesCollection();
                articles.fetch({
                    'error' :   function () {alert('error')},
                    'success' :  function (articles) {
                        var template = _.template($('#articles-template').html(),{articles: articles.models});
                        that.$('.page').html(template);
                    }
                });

            }
        });
        var ArticleListViewInstance = new ArticlesListView();
        router.on('route:home', function () {
            ArticleListViewInstance.render();
        });

        Backbone.history.start();
    </script>
@stop
