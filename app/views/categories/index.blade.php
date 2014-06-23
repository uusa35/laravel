@extends('master')
@section('content')
    <div class="col-md-10">
        <h3>All Categories</h3>
        @if($errors->any())
        <div class="alert alert-danger">
            {{ implode('',$errors->all('<li>:message</li>'))}}
        </div>
        @endif
        <table class="table table-bordered">
            <th>id</th>
            <th>name</th>
            <th>created_at</th>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ Form::open(array('url'=>'admin/categories/destroy', 'method'=>'post')) }}
                        {{ Form::submit('delete', array('class'=>'btn btn-danger'))}}
                        {{ Form::hidden('id',$category->id)}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-10">
        <h3>create category</h3>
        {{ Form::open(array('url'=> 'admin/categories/create')) }}
        <div class="control-group">
            {{ Form::label('name') }}
            {{ Form::text('name','',array('class'=>'form-control')) }}
        </div>
        <div class="control-group">
            {{ Form::submit('create', array('class'=>'btn btn-success')) }}
        </div>
        {{ Form::close() }}
    </div>
@stop