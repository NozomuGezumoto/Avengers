@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="conteiner">
    <div class="row">
      <div class="col-6 rank_text">
        <h2>REVIEW RANKING</h2>
      </div>
    </div>
  </div>

<div class="match_con like">
    <div class="conteiner list">
        <div class="row ranks">
            <div class="col-sm-6 list ranking_list">
              @isset($rankinglike1)
                @foreach ($rankinglike1 as $review)
                        <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
                        <input type="hidden" class="review-id" value="{{ $review->id }}">
                        <span class="js-like-num">{{ $review->likes->count() }}</span>
                        <p><img class="list_u" height="200px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->food_img_path)}}"></p>
                @endforeach
              @endisset
            </div>




            <div class="col-12 list ranking_list">
              @isset($rankinglike2)
                @foreach ($rankinglike2 as $review)
                        <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
                        <input type="hidden" class="review-id" value="{{ $review->id }}">
                        <span class="js-like-num">{{ $review->likes->count() }}</span>
                        <p><img class="list_u" height="200px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->food_img_path)}}"></p>
                @endforeach
              @endisset
            </div>



            <div class="col-12 list ranking_list">
             @isset($rankinglike3)
                @foreach ($rankinglike3 as $review)
                        <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
                        <input type="hidden" class="review-id" value="{{ $review->id }}">
                        <span class="js-like-num">{{ $review->likes->count() }}</span>
                        <p><img class="list_u" height="200px" src="{{ asset($review->user->picture_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->animal_img_path) }}"></p>
                        <p><img width="100" height="200px" src="{{ asset($review->food_img_path)}}"></p>
                        @endforeach
                        @endisset
            </div>
       </div>
  </div>
</div>
    </div>
@endsection