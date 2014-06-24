@extends('master')
@section('content')
<div class="col-lg-10 col-md-10">
    <h3>create a product</h3>
    @if($errors->any())
    <div class="alert alert-danger">
        {{ implode('',$errors->all('<li>:message</li>')) }}
    </div>
    @endif
    {{ Form::open(array('url'=>'admin/products/create', 'method'=>'post','role'=>'form', 'files'=>'true')) }}
    <div class="control-group">
    {{ Form::label('title') }}
    {{ Form::text('title', '', array('class'=>'form-control')) }}
    </div>
    <div class="control-group">
    {{ Form::label('description') }}
    {{ Form::textarea('description','',array('class'=>'form-control', 'rows'=>20)) }}
    </div>
    <div class="control-group">

    {{ Form::label ('category_id') }}
    {{ Form::select('category_id', $categories, array('class'=>'form-control')) }}
    </div>
    <div class="control-group">
    {{ Form::label('availability') }}
    {{ Form::select('availability', array('0'=>'out of stock','1'=>'in stock'), array('class'=>'form-control')) }}
    </div>
    <div class="control-group">
        {{ Form::label('price') }}
        {{ Form::macro('number', function()
        {
        return '<input type="number" class="form-control" name="price" />';
        }) }}
        {{ Form::number() }}
    </div>
    <div class="control-group">
    {{ Form::label('image') }}
    {{ Form::file('image',array('class' => 'form-control')) }}
    </div>
    <div class="control-group">
    {{ Form::submit('create', array('class'=>'btn btn-success')) }}
    </div>
    {{ Form::close() }}
</div>
@stop