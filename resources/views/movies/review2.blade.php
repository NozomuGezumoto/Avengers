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
  {{-- $value = $_POST['value']; --}}
  <div class="sub">
    <p><b>Fruits</b></p>
  </div>
    <form action="{{ route('movie.match') }}" method="get"
    class="form" id="actionform">
        <img class="img2" src="{{asset('images/animal6.jpg')}}">
        <img class="img2" src="{{asset('images/animal7.jpg')}}">
        <img class="img2" src="{{asset('images/animal8.jpg')}}">
        <img class="img2" src="{{asset('images/animal9.jpg')}}">
        <img class="img2" src="{{asset('images/animal10.jpg')}}">
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