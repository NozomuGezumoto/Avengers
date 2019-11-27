<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')

<div class="container">
  <form action="{{ route('movie.search') }}" method="get">
      <input type="text" class="form-control" name="movie_title" id="movie_title" placeholder="映画のタイトル">
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @foreach ($new_movies as $new_movie)
      <p>{{$new_movie->title}}</p>
      {{-- 300,450 --}}
      <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$new_movie->poster_path}}">
      {{-- <p>{{$new_movie->overview}}</p> --}}
  @endforeach

  @endsection