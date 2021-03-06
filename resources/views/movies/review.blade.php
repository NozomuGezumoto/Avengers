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
  <div class="row review_list">
      @foreach ($reviews as $review)
<div class="col-sm-6">
  <div class="row">
          @if (Auth::check() && $review->likes->contains(function ($user) {
            return $user->id === Auth::user()->id;
          }))
            <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
          @else
            <i class="far fa-heart fa-lg text-danger js-like"></i>
          @endif
          <input type="hidden" class="review-id" value="{{ $review->id }}">
          <span class="js-like-num">{{ $review->likes->count() }}</span>
        <p><img class="list_u" height="100px" src="{{ $review->user->picture_path }}"></p>
           <p ><img width="100" height="200px" src="{{ asset($review->animal_img_path) }}"></p>
           <p><img width="100" height="200px" src="{{ asset($review->food_img_path)}}"></p>
          {{-- </div> --}}
        </div>
      </div>
      @endforeach
    </div>
  @endsection