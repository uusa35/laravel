@extends('admin.master')
@section('content')
<div class="col-md-8">
    @if($errors->any())
    <ul>
        {{ implode("", $errors->all('<li>:message</li>')) }}
    </ul>
    @endif
    {{ Form::open(array('route'=>'account-create', 'method'=>'post', 'role'=>"form")) }}
    <div class="form-group">
        {{ Form::label('username') }}
        {{ Form::text('username', '', array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('email') }}
    {{ Form::email('email', '', array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('repassword') }}
        {{ Form::password('repassword', array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::submit('submint', array('class'=>'btn btn-defult')) }}
    </div>
    {{ Form::close() }}
</div>
@stop