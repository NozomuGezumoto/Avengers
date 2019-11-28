@extends('layout')

@section('title', 'ホーム')

@section('content')
{{-- <div>{{ $movies }}</div> --}}

    @foreach ($movies as $movie)
      {{-- $loopでforeachの数 index現在の出力数 ３になったら break終了 --}}
      @if ($loop->index >= 3)
        @break
      @endif

     <div class="container_list">
      <div class="row">
        <form action="{{ route('movie.review', ['id' => $movie->id]) }}" method="get">
          <a href="{{ route('movie.review', ['id' => $movie->id]) }}">
          <p>{{$movie->title}}</p>
          <p>{{$movie->release_date}}</p>
          <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$movie->poster_path}}"></button>
          {{-- <p>{{$movie->overview}}</p> --}}
          </a>
        {{-- <p>{{$movie->}}}</p> --}}
        </form>
      </div>
    </div>
    @endforeach
@endsection