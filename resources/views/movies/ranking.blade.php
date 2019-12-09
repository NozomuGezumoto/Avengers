@extends('layout')

@section('title', 'ホーム')

@section('content')
  <div class="match_con">
      <div class="row">
          <a href="{{ route('ranking.like', ['id' => $ranking1->id]) }}">
              @isset($ranking1)
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking1->poster_path}}" value="$result->poster_path">
              @endisset
              @isset($ranking2)
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking2->poster_path}}" value="$result->poster_path">
              @endisset
              @isset($ranking3)
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking3->poster_path}}" value="$result->poster_path">
              @endisset
          </a>
      </div>
  </div>
  @endsection



