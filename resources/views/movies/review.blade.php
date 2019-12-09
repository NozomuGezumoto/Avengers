<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'ホーム')

@section('content')
  <div class="container_list">
    <div class="row">
      <form action="{{ route('movie.exchange') }}" method="get">
        {{-- <p>{{$id->title}}</p> --}}
        <img class="review_img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$id->poster_path}}">
        {{-- <p>{{$id->overview}}</p> --}}
        <div class="btn_review">
            <button type="submit" class="btn-outline-warning btn-lg">review</button>
        </div>
      </form>
    </div>
  </div>
  <div>
      @foreach ($reviews as $review)
        <div class="col-10 list">
          <div class="row">
      {{-- usersテーブルからの投稿者情報 --}}
          {{-- <p>{{ $review->user->name }}</p> --}}
          <p><img class="list_u" height="50px" src="{{ asset($review->user->picture_path) }}"></p>
          {{-- <p>{{ $review->user->comment }}</p> --}}

      {{-- reviewsテーブルからの投稿者情報 --}}
          {{-- <p>{{ $review->comment }}</p> --}}
          <p><img height="80px" src="{{ asset($review->animal_img_path) }}"></p>
          <p><img height="80px" src="{{ asset($review->food_img_path)}}"></p>
        </div>
      </div>
      @endforeach
  </div>

  @endsection