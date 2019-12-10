@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="confirm">
  {{-- <h2 class="finish">登録完了しました！</h2> --}}
    <form action="{{ route('movie.index') }}" method="get">
      <button type="submit" class="btn btn-outline-primary"><i class="fas fa-home icons"></i>登録完了しました！</button>
    </form>
</div>

@endsection