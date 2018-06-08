@extends('layouts.app')

@section('content')

    <h1>{{$post->title}}</h1>
    <div>
       {!! $post -> body !!}
    </div>
    <hr>
    <p class="blog-post-meta">Napisane {{$post -> created_at}} przez {{$post->user->name}}</p>
    <hr>

    <a href="/posts" class="btn btn-outline-dark" role="button">Powrót</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post -> user_id)
            {!! Form::open(['action' => ['PostsController@destroy', $post -> id], 'method' => 'POST', 'class'=>'float-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Usuń', ['class' => 'btn btn-outline-danger']) }}
            {!! Form::close() !!}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark float-right" role="button">Edytuj</a>
        @endif
    @endif
@endsection
