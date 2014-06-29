@extends('master')
@section('content')

    @if(isset($article))
    <div class="panel panel-primary">
        <div class="panel-heading">{{ $article->title }}</div>

        <div class="panel-body">
            <p> {{ $article->author }} </p>
            <p> {{ $article->body }} </p>
        </div>
    </div>

    @else
    there is no article !!
    @endif
@stop