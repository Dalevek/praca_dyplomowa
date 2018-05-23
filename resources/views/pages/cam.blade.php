@extends('layouts.app')

@section('content')
<h1>Kamera</h1>
<p>Podgląd z kamery</p>
<img src="http://192.168.1.6:8000/stream.mjpg" width="640" height="480" />

@endsection