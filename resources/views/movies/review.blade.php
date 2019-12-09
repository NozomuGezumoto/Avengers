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
      {{-- いいね機能 --}}
      <div class="mt-3 ml-3">
          @if (Auth::check() && $review->likes->contains(function ($user) {
            return $user->id === Auth::user()->id;
          }))
            {{-- ログインしている かつ この投稿にいいねしている場合 --}}
            <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
          @else
            {{-- いいねしていない場合 --}}
            <i class="far fa-heart fa-lg text-danger js-like"></i>
          @endif
          <input type="hidden" class="review-id" value="{{ $review->id }}">
          <span class="js-like-num">{{ $review->likes->count() }}</span>
      </div>
      {{-- usersテーブルからの投稿者情報 --}}
      <p>{{ $review->user->name }}</p>
      <p><img height="80px" src="{{ asset($review->user->picture_path) }}"></p>
      <p>{{ $review->user->comment }}</p>

      {{-- reviewsテーブルからの投稿者情報 --}}
      <p>{{ $review->comment }}</p>
      <p><img height="80px" src="{{ asset($review->animal_img_path) }}"></p>
      <p><img height="80px" src="{{ asset($review->food_img_path)}}"></p>
      @endforeach
  </div>

  @endsection