@extends('master')
<h3>login form</h3>
@section('content')
    {{ Form::open(array('route'=> 'login-post', 'method'=>'post', 'role'=>'form')) }}
    {{ Form::label('email') }}
    {{ Form::email('email', 'usama@usama.com', array('class'=>'form-control')) }}
    {{ Form::label('password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}
    {{ Form::submit('submit', array('class'=>'btn btn-primary')) }}
</br>
    {{ Form::close() }}
@stop