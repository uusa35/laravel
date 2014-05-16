@extends('admin.master')
@section('content')
<div class="col-lg-5">

    @if($errors->any())
    <ul class="alert alert-danger">
        <h3>Errors </h3>
    {{ implode('', $errors->all('<li class="has-error">:message</li>')) }}
    </ul>
    @endif

    {{ Form::open(array('route'=> 'admin.articles.store', 'role'=>'form')) }}
    <div class="form-group">
    {{ Form::label('author')}}
    {{ Form::text('author', 'Usama Ahmed', array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
        {{ Form::label('category', 'Category')}}
        {{ Form::select('category', CategoryArticle::all() , array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
    {{ Form::label('title')}}
    {{ Form::text('title', 'Title Here', array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
    {{ Form::label('body')}}
    {{ Form::textarea('body', 'body goes here', array('class'=> 'form-control'))}}
    </div>
    <div class="form-group">
    {{ Form::submit('Create', array('class'=>'btn btn-success'))}}
    {{ Form::close() }}
    {{ link_to_route('admin.articles.index', 'Cancel' ,'',array('class'=>'btn btn-danger'))}}
    </div>
</div>
@stop