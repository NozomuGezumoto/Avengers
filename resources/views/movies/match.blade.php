@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="match_con">
  <div class="row">
      <form action="{{ route('movie.confirm') }}" method="get">
    <img class="match" src="{{$img1}}">
    <img class="match" src="{{$img2}}">
    <button type="submit" class="btn-outline-warning btn-lg">review</button>
      </form>
  </div>
</div>

@endsection