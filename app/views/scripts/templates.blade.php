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

        <tr>
            <td><%= article.get('id') %></td>
            <td><%= article.get('author') %></td>
            <td><a href="/articles/<%= article.get('id') %>"><%= article.get('title') %></a>
            </td>
            <td><%= article.get('created_at') %></td>
            <td><%= article.get('updated_at') %></td>
            <td><a href="#/edit/<%= article.get('id') %>" class="btn btn-warning" role="button">edit</a>
            </td>
        </tr>

        <% }); %>
        </tbody>
        </thead>
    </table>
</script>

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
        <tr>
            <td><%= article.get('id') %></td>
            <td><%= article.get('author') %></td>
            <td><a href="/articles/<%= article.get('id') %>"><%= article.get('title') %></a>
            </td>
            <td><%= article.get('created_at') %></td>
            <td><%= article.get('updated_at') %></td>
            <td><a href="#/edit/<%= article.get('id') %>" class="btn btn-warning" role="button">edit</a>
            </td>
        </tr>
        <% } %>
        <% }); %>
        </tbody>
        </thead>
    </table>
</script>
<script type="text/template" id="create-new-article-template">
    <legend><% articleItem ? 'Update' : 'Create' %> Article</legend>
    <form action="#" role="form" class="<%= articleItem ? 'edit' : 'create' %>-article-form col-md-7">
        <input type="hidden" name="id" value="<%= articleItem ? articleItem.get('id') : '' %>"/>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control"
                   value="<%= articleItem ? articleItem.get('author') : 'author' %>"/>
        </div>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control"
                   value="<%= articleItem ? articleItem.get('title') : 'title' %>"/>
        </div>
        <div class="form-group">
            <label for="category_id">category</label>
            <input type="number" max="10" min="0" name="category_id" class="form-control"
                   value="<%= articleItem ? articleItem.get('category_id') : 'category' %>"/>
        </div>
        <div class="form-group">
            <label for="body">body</label>
            <textarea name="body" class="form-control"
                      rows="5"><%= articleItem ? articleItem.get('data.body') : 'Body' %></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</script>
<script type="text/template" id="show-article-template">

    </script>