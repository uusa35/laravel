@extends('master')
@section('content')
<div class="col-lg-5">

    {{ Form::open(array('action'=> array('articles.update',$article->id) ,'method'=>'PATCH', 'role'=>'form')) }}
    <div class="form-group">
        {{ Form::label('author')}}
        {{ Form::text('author', $article->author , array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
        {{ Form::label('title')}}
        {{ Form::text('title', $article->title , array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
        {{ Form::label('body')}}
        {{ Form::textarea('body', $article->body , array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
        {{ Form::submit('update', array('class'=>'btn btn-success'))}}
        {{ Form::close() }}
        {{ link_to_route('articles.index', 'Cancel' ,'',array('class'=>'btn btn-danger'))}}
    </div>
</div>
@stop