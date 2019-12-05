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
   
    {{-- @foreach ($data as $data)
    @if ($loop->index >= 5)
    @break
    @endif
    <img  class="img2" src="{{$data->path}}">
    @endforeach --}}

    @foreach ($data as $data)
    @if ($loop->index >= 10)
    @elseif (
    $loop->index === 1|
    $loop->index === 2||
    $loop->index === 3||
    $loop->index === 0||
    $loop->index === 4)
    @continue
    @break
    @endif
    <img  class="img2" src="{{$data->path}}">
    @endforeach

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