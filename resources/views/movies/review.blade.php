<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')

    <form action="{{ route('movie.exchange') }}" method="get">
        <p>{{$id->title}}</p>
        <button>Movie Exchenger</button>
        <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$id->poster_path}}">
        <p>{{$id->overview}}</p>
    </form>

  @endsection