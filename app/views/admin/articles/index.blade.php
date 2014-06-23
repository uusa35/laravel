@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ link_to_action('ArticleController@create', 'Create' ,'', ['class'=>'btn btn-primary']) }}
        <hr>
        @if($articles->count())
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">All Articles</div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <th>title</th>
                    <th>author</th>
                    <th></th>
                    <th></th>


                    </thead>
                    <tbody>

                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ link_to_route('admin.articles.show', $article->title , $article->id) }}</td>
                        <td>{{ link_to_route('admin.articles.edit', 'Edit', [$article->id], ['class' =>'btn btn-primary']) }}</td>
                        <td>{{  Form::open(['action'=> 'ArticleController@destroy', $article->id], ['method'=>'POST']) }}
                            {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        <ul class="pagination">
        {{ $articles->links() }}
        </ul>
        @else

        <div class="alert alert-danger alert-dismissable">
           !!!!!!
        </div>
        @endif
    </div>
</div>
@endsection