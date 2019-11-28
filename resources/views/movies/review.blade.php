<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')
  <div class="container_list">
    <div class="row">
      <form action="{{ route('movie.exchange') }}" method="get">
        <p>{{$id->title}}</p>
        <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$id->poster_path}}">
        {{-- <p>{{$id->overview}}</p> --}}
        <div class="btn_review">
            <button type="submit" class="btn-outline-warning btn-lg">review</button>
        </div>
      </form>
    </div>
  </div>

  @endsection