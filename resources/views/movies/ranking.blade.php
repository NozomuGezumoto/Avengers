@extends('layout')

@section('title', 'ホーム')

@section('content')

  {{-- とりあえずDBからreviewの一覧を取って来る --}}


  @foreach($reviews as $review)
  <div class="m-4 p-4 border border-primary">

   <p>{{$review->id}}</p>
   <p>{{$review->user_id}}</p>
   <p>{{$review->movie_id}}</p>
   <p>{{$review->animal_img_path}}</p>
   <p>{{$review->fruit_img_path}}</p>
   <p>{{$review->created_at}}</p>
  </div>

   @endforeach

@endsection



