@extends('layout')

@section('title', 'ホーム')

@section('content')
{{-- <div>{{ $movies }}</div> --}}
{{-- <div class="container_serch">
    <div class="row">
      <div class="col-9 movies">
        <form action="{{ route('movie.search') }}" method="get">
        <input type="text" class="form-control" name="movie_title" id="movie_title" placeholder="映画のタイトル">
      </div>
      <div class="col-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div> --}}
  <form action="{{ route('movie.search') }}" method="get">
      <div class="container_serch">
        <div class="row search-bar">
          <div class="input-group">
          <input type="text" class="form-control" name="movie_title" id="movie_title" placeholder="映画のタイトル">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
          </div>
          </div>
        </div>
      </div>
  
  </form>

  {{-- $loopでforeachの数 index現在の出力数 5になったら break終了 --}}
    @foreach ($movies as $movie)
      @if ($loop->index >= 5)
        @break
      @endif

     <div class="container_list">
      <div class="row">
        <form action="{{ route('movie.review', ['id' => $movie->id]) }}" method="get">
          <a href="{{ route('movie.review', ['id' => $movie->id]) }}">
          <p>{{$movie->title}}</p>
          <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$movie->poster_path}}"></button>
          {{-- <p>{{$movie->overview}}</p> --}}
          </a>
        </form>
      </div>
     </div>
    @endforeach
@endsection