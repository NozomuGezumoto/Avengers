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
          <form action="{{ route('movie.review2') }}" method="get" class="form" id="actionform">
            <img class="img" src="{{asset('images/animal.jpg')}}">
            <img class="img" src="{{asset('images/animal1.jpg')}}">
            <img class="img" src="{{asset('images/animal3.jpg')}}">
            <img class="img" src="{{asset('images/animal4.jpg')}}">
            <img class="img" src="{{asset('images/animal5.jpg')}}">
          {{-- <div>
        <button type="submit" class="btn_ex btn-outline-warning btn-lg">次へ</button>
          </div> --}}
          </form>
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