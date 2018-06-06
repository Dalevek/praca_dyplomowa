<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}" >
    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/sticky-footer-navbar.css')}}" >

    <title>{{$title}} - Projekt dyplomowy</title>

</head>
<body>
@include('inc.navbar')
<main role="main" class="container">
    @include('inc.messages')
    @yield('content')
</main>
@include('inc.footer')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
</body>
</html>
