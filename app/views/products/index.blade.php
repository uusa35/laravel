@extends('master')
@section('content')
<div class="col-md-12">
    <table class="table table-bordered table-hovered">
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>images</th>
        <th>availability</th>
        <tbody>
                @if($products->count())
                @foreach($products as $product)
                <tr>
                <td>{{ $product->id}}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->images}}</td>
                <td>{{ $product->availability }}</td>
                <td>{{ Form::open(array('url'=> array('admin/products/toggle_availability', $product->availability))) }}
                    {{ Form::select('availability', array('1'=>'In Stock','0'=>'Out of Stock'),$product->availability, array('class'=>'form-control')) }}
                    {{ Form::submit('submit', array('class'=>'btn btn-default')) }}
                    {{ Form::close() }}
                </td>
                <td>
                {{ Form::open(array('url'=>array('admin/products/destroy', $product->id), 'method'=>'DELETE')) }}
                {{ Form::submit('Delete', array('class'=>'btn btn-danger' ))}}
                {{ Form::close() }}
                </td>
                </tr>
                @endforeach
                @else
                there is no products
                @endif
        </tbody>
    </table>
</div>
@stop