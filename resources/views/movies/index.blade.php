<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')


{{-- <div class="col-sm-5 movies"> --}}
  {{-- <div class="container_serch">
    <div class="row"> --}}
        <form action="{{ route('movie.search') }}" method="get">
            <div class="container_serch">
              <div class="row search-bar">
                <div class="input-group">
                <input type="text" class="form-control" name="movie_title" placeholder="映画のタイトル" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
                </div>
              </div>
            </div>
        
        </form>
    {{-- </div>
  </div> --}}

<div class="container_img">
    <div class="row">
      @foreach ($new_movies as $new_movie)
      <form action="{{ route('movie.review', ['id' => $new_movie->id]) }}" method="get">
          <a href="{{ route('movie.review', ['id' => $new_movie->id]) }}">
              {{-- <p class="movie_title">{{$new_movie->title}}</p> --}}
              {{-- 300,450 --}}
                <img class="title_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$new_movie->poster_path}}">
              </a>
                {{-- <p>{{$new_movie->overview}}</p> --}}
            </form>
        @endforeach
    </div>
</div>

  @endsection