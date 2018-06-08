@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3>Panel użytkownika</h3>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-outline-dark">Utwórz post</a>
                    <h5>Twoje posty</h5>
                    @if(count($posts)>0)
                    <table class="table table-bordered" >
                        <thead>
                        <tr>
                            <th>Tytuł</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark" role="button">Edytuj</a> </td>
                                <td>
                                    <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Post{{$post->id}}">
                                            Usuń
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="Post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Usuwanie</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Czy usunąć post o nazwie "{{$post->title}}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                                        {!! Form::open(['action' => ['PostsController@destroy', $post -> id], 'method' => 'POST', 'class'=>'float-none']) !!}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        {{ Form::submit('Usuń', ['class' => 'btn btn-danger']) }}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <h6>Nie masz dodanych postów!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
