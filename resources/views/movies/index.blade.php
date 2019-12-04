<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')

<div class="container_serch">
  <div class="row">
    <div class="col-sm-6 movies">
      <form action="{{ route('movie.search') }}" method="get">
        <input type="text" class="form-control" name="movie_title" id="movie_title" placeholder="映画のタイトル">
    </div>
    <div class="col-sm-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
      </form>
  </div>
</div>
<div class="container_img">
    <div class="row">
        @foreach ($new_movies as $new_movie)
            <form action="{{ route('movie.review', ['id' => $new_movie->id]) }}" method="get">
                <a href="{{ route('movie.review', ['id' => $new_movie->id]) }}">
                {{-- <p class="movie_title">{{$new_movie->title}}</p> --}}
                {{-- 300,450 --}}
                <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$new_movie->poster_path}}" class="col-xs-3">
                {{-- <p>{{$new_movie->overview}}</p> --}}
                </a>
            </form>
        @endforeach
    </div>
</div>

  @endsection