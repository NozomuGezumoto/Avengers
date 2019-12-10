@extends('layout')

@section('title', 'ホーム')

@section('content')

<div class="match_con">
        <div class="row">
            @isset($rankinglike1)
                @foreach ($rankinglike1 as $review)
                    <div class="col-10 list">
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

                        <p><img class="list_u" height="50px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->food_img_path)}}"></p>
                    </div>
                @endforeach
            @endisset

            <div>
            @isset($rankinglike2)
                @foreach ($rankinglike2 as $review)
                    <div class="col-10 list">
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
                        <p><img class="list_u" height="50px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->food_img_path)}}"></p>
                    </div>
                @endforeach
            @endisset
            </div>

            <div>
            @isset($rankinglike3)
                @foreach ($rankinglike3 as $review)
                    <div class="col-10 list">
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
                        <p><img class="list_u" height="50px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img height="80px" src="{{ asset($review->food_img_path)}}"></p>
                    </div>
                @endforeach
            @endisset
            </div>
        </div>
    </div>
@endsection