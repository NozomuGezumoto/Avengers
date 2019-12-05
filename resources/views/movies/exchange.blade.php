@extends('layout')

@section('title', 'ホーム')

@section('content')

  <div class="image_list">
    <div class="row">
      {{-- <button type="submit" id="open" class="btn-outline-warning btn-lg">
        詳細をみる
    </button>
       <div id="mask" class="hidden"></div>
        <section id="modal" class="hidden">
         <div class="img_list"> --}}
  {{-- <div class="col-sm-12">
    <div class="row"> --}}
    <div class="sub">
      <p><b>Animals</b></p>
    </div>
    {{-- <div class="img_a"> --}}
      <form action="{{ route('movie.review2') }}" method="get" class="form" id="actionform">

        @foreach ($data as $data)
        @if ($data->category == 2)
          @continue
      @endif
        <img  class="animal_img click-img" src="{{$data->path}}">
        @endforeach
      </form>
    {{-- </div> --}}
           {{-- </div>
           </div> --}}
         {{-- </div> --}}
        {{-- <div id="close">
          閉じる
       </div> --}}

    </div>
  </div>
      </section>

      @endsection