@extends('layouts.app')

@section('content')
    <h1>Utwórz post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Tytuł')}}
            {{Form::text('title','',['class' => 'form-control', 'placeholder'=> 'Tytuł posta'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Treść')}}
            {{Form::textarea('body','',['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=> 'Treść posta'])}}
        </div>
    {{Form::submit('Dodaj',['class' => 'btn btn-outline-dark'])}}
    {!! Form::close() !!}


@endsection
