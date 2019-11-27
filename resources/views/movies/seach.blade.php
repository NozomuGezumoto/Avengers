@extends('layout')

@section('title', 'ホーム')

@section('content')
{{-- <div>{{ $movies }}</div> --}}
    @foreach ($movies as $movie)
    <form action="{{ route('movie.review', ['id' => $movie->id]) }}" method="get">
        <a href="{{ route('movie.review', ['id' => $movie->id]) }}">
          <p>{{$movie->title}}</p>
          <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$movie->poster_path}}"></button>
          <p>{{$movie->overview}}</p>
        </a>
        {{-- <p>{{$movie->}}}</p> --}}

    @endforeach
@endsection