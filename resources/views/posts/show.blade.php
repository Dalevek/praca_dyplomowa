@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-dark" role="button">Powrót</a>
    <h1>{{$post->title}}</h1>
    <div>
       {!! $post -> body !!}
    </div>
    <hr>
    <p class="blog-post-meta">Napisane {{$post -> created_at}}</p>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark" role="button">Edytuj</a>
    {!! Form::open(['action' => ['PostsController@destroy', $post -> id], 'method' => 'POST', 'class'=>'float-right']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }}
    {!! Form::close() !!}
@endsection
