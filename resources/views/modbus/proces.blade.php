@extends('layouts.app')

@section('content')
    <table class="table table-bordered" >
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Wartość</th>
        </tr>
        </thead>
        <tbody>
    @foreach($values as $tag => $item)
        <tr>
            <td>{{$tag}}</td>
            <td>{{$item}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>

@endsection
