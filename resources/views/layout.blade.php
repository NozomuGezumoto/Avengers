<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/movies.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

      {{-- <a href="{!! action('MovieController@Mypage') !!}"><i class="far fa-user icons"></i></a> --}}
      {{-- <i class="far fa-heart icons"></i> --}}


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
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <script src="../js/movie.js"></script>

</body>
</html>