@extends('layouts.app')

@section('content')
    <h1>Posty</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post -> id}}">{{$post -> title}}</a></h2>
                <p class="blog-post-meta">Napisane {{$post -> created_at}}</p>
            </div>
        @endforeach



        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                @if($posts->currentPage()>1)
                    <li class="page-item ">
                        <a class="page-link" href="{{$posts ->previousPageUrl()}}" tabindex="-1">Poprzednia</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Poprzednia</a>
                    </li>
                @endif

                    @for($i=1;$i<=($posts->lastPage());$i++)
                        @if($posts->currentPage() == $i)
                            <li class="page-item disabled"><a class="page-link" href="{{$posts->url($i)}}">{{$i}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$posts->url($i)}}">{{$i}}</a></li>
                        @endif

                    @endfor

                @if($posts->currentPage()<$posts->lastPage())
                    <li class="page-item ">
                        <a class="page-link" href="{{$posts ->nextPageUrl()}}" tabindex="-1">Następna</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Następna</a>
                    </li>
                @endif
            </ul>
        </nav>

    @else
        <p>Brak informacji na stronie</p>

    @endif
@endsection
