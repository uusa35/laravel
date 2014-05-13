@extends('admin.master')
@section('content')
<div class="col-md-12">
    @if($errors->any())
    <div class="alert alert-dismissable alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p>{{ implode('',$errors->all('<li>:message</li>')) }}.</p>
    </div>
    @endif
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
                <td> {{ HTML::image($product->image,$product->image, ['class'=>'img-responsive', 'width'=>'45']) }}</td>
                <td>{{ $product->availability }}</td>
                <td>{{ Form::open(array('url'=> ['admin/products/postAvail'],'method'=>'post')) }}
                    {{ Form::select('availability', array('1'=>'In Stock','0'=>'Out of Stock'),$product->availability, array('class'=>'form-control')) }}
                    {{ Form::submit('submit', array('class'=>'btn btn-default')) }}
                    {{ Form::close() }}
                </td>
                <td>
                {{ Form::open(array('url'=>array('admin/products/destroy'), 'method'=>'post')) }}
                {{ Form::hidden('id',$product->id) }}
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