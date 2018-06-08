@extends('layouts.app')

@section('content')
    <h1>Logi</h1>
    <a class="btn btn-outline-dark" href="/modbus/index">Wszystkie</a>
    @foreach($unique as $name)
        <a class="btn btn-outline-dark" href="/modbus/index?search={{ $name }}">{{ $name }}</a>
    @endforeach
    <!--
    {!! Form::open(['method'=>'GET','url'=>'/modbus/index','class'=>'navbar-form navbar-left','role'=>'search'])  !!}


    <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="search" placeholder="Search...">
        <span class="input-group-btn">
        <button class="btn btn-outline-dark" type="submit">
            Szukaj
        </button>
    </span>
    </div>
    {!! Form::close() !!}
-->

        <table class="table table-bordered" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Wartość</th>
                <th>Data</th>
                <th>Typ zmiennej</th>
                <th>Adres</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->reg_comment}}</td>
                    <td>{{$tag->reg_value}}</td>
                    <td>{{$tag->reg_date}}</td>
                    <td>{{$tag->reg_type}}</td>
                    <td>{{$tag->reg_address}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>





    <!-- paginator -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if($data->currentPage()>1)
                <li class="page-item ">
                    <a class="page-link" href="{{$data ->previousPageUrl()}}" tabindex="-1">Poprzednia</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Poprzednia</a>
                </li>
            @endif

            @if($data->lastPage() > 25)
                    @for($i=1;$i<=5;$i++)
                        @if($data->currentPage() == $i)
                            <li class="page-item disabled"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @endif
                    @endfor
                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                    @for($i=($data->lastPage())-5;$i<=($data->lastPage());$i++)
                        @if($data->currentPage() == $i)
                            <li class="page-item disabled"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @endif
                    @endfor
            @else
                @for($i=1;$i<=($data->lastPage());$i++)
                        @if($data->currentPage() == $i)
                            <li class="page-item disabled"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
                        @endif
                @endfor
            @endif

            @if($data->currentPage()<$data->lastPage())
                <li class="page-item ">
                    <a class="page-link" href="{{$data ->nextPageUrl()}}" tabindex="-1">Następna</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Następna</a>
                </li>
            @endif
        </ul>
    </nav>



@endsection
