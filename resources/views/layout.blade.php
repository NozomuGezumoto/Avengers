<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html lang="ja"> ネモ--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> ネモ--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/movie.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/movies.css">


    <title>@yield('title')</title>
</head>
<body>
    <header>
      <div class="row">
        <img class="main" src="{{asset('images/animal.jpg')}}">
        <img class="main_2" src="{{asset('images/fruit.jpg')}}">
        <h1 class="title">Movie Translator</h1>
      </div>
    </header>
 @yield('content')
 <footer>
   <div class="footer">
      <a href="{!! action('MovieController@index') !!}"><i class="fas fa-home icons"></i></a>
      <a href="{!! action('MovieController@searchicon') !!}"><i class="fas fa-search icons"></i></a>
      <a href="{!! action('MovieController@hearticon') !!}"><i class="far fa-heart icons"></i></a>



      {{-- マイページへのリンク --}}
      {{-- <a href="{!! action('MovieController@Mypage') !!}">
        <i class="far fa-user icons">
          <img height="40px" src="{{ asset(Auth::user()->picture_path) }}" >
        </i>
      </a> --}}


      <a href="{!! action('MovieController@Mypage') !!}">

      @if (isset(Auth::user()->picture_path))
        <img height="40px" src="{{ asset(Auth::user()->picture_path) }}" >
      @else
        <i class="far fa-user icons"></i>
      @endif
      </a>



   </div>
 </footer>
{{-- いいね機能追加のためコメントアウト ネモ--}}
 {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
 {{-- <script src="../js/movie.js"></script> --}}
 {{-- いいね機能追加のためコメントアウト ネモ--}}

</body>
</html>