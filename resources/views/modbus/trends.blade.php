@extends('layouts.app')

@section('content')
    <h1>Wykresy</h1>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    {{--<a class="btn btn-outline-dark" href="/modbus/trends">Wszystkie</a>--}}
    @foreach($unique as $name)
        <a class="btn btn-outline-dark" href="/modbus/trends?search={{ $name }}">{{ $name }}</a>
    @endforeach


    <div style="width:100%;">
        {!! $chartjs->render() !!}
    </div>

    {{--@foreach($chart_coll as $trend)--}}
        {{--<div style="width:100%;">--}}
            {{--{!! $trend->render() !!}--}}
        {{--</div>--}}
    {{--@endforeach--}}

@endsection