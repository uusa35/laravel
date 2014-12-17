@section('footer')
    @parent
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js") }}
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
                    'succes' : function () {
                                that.$el.html('cool its workin from the backbone Page :) ');
                                }
                });

            }
        });
        /*URL Prefix*/
        $.ajaxPrefilter(function (options,originalOptions, jqXHR) {
            options.url = 'http://projects-usama-ahmed.tk/api' + options.url;
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