@extends('layouts.app')

@section('content')

    {{URL::to('/public/3_Praca_MGR.pdf')}}
    <iframe src="{{URL::to('/public/3_Praca_MGR.pdf')}}" width="100%" height="100%"></iframe>

@endsection