@section('footer')
    @parent
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
        /*Routes*/
        var Router = Backbone.Router.extend({
            routes: {
                ''          : 'home',
                '/articles' : ''
            }
        });
        var router = new Router();
        /*Views*/
        var ArticlesListView = Backbone.View.extend({
            el      :'.page',
            render  : function () {
                var that = this;
                var articles = new ArticlesCollection();
                articles.fetch({
                    'error' :   function () {alert('error')},
                    'succes' :  function (articles) {
                                var template = _.template($().html(),{articles: articles.models});
                                that.$el.html(template);
                                }
                });

            }
        });
        /*URL Prefix*/
        $.ajaxPrefilter(function (options,originalOptions, jqXHR) {
            options.url = 'http://projects-usama-ahmed.tk/api' + options.url;
            alert(options.url);
        });
        /*Collection*/
        var ArticlesCollection = Backbone.Collection.extend({
            'url'   : '/articles'
        });
        var ArticleListViewInstance = new ArticlesListView();
        router.on('route:home', function () {
            ArticleListViewInstance.render();
        });

        Backbone.history.start();
    </script>
@stop