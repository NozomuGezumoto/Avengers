@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="match_con">
  <div class="row">
      <form action="{{ route('movie.confirm') }}" method="get">
        <img name="movie_id" class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$result->poster_path}}" value="$result->poster_path">
        {{-- <p>{{ $user_id }}</p> --}}
        <img class="match" src="{{$img1}}">
        <img class="match" src="{{$img2}}">
        <button type="submit" class="btn-outline-warning btn-lg">review</button>
    </form>
  </div>
</div>

@endsection