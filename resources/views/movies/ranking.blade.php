@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="conteiner">
  <div class="row">
    <div class="col-6 rank_text">
      <h2>MOVIE RANKING</h2>
    </div>
  </div>
</div>
  <div class="match_con rank">
      <div class="row">
        <div class="col-10 rank_text">
          @isset($ranking1)
              <a href="{{ route('ranking.like', ['id' => $ranking1->id]) }}">
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking1->poster_path}}" value="$result->poster_path">
              </a>
          @endisset
        </div>
        <div class="col-10 rank_text">
          @isset($ranking2)
              <a href="{{ route('ranking.like', ['id' => $ranking2->id]) }}">
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking2->poster_path}}" value="$result->poster_path">
              </a>
          @endisset
          @isset($ranking3)
        </div>
        <div class="col-10 rank_text">
              <a href="{{ route('ranking.like', ['id' => $ranking3->id]) }}">
              <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$ranking3->poster_path}}" value="$result->poster_path">
              </a>
              @endisset
        </div>
      </div>
  </div>
  @endsection



