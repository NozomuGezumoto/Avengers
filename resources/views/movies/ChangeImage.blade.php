{{-- @extends('layouts.app') --}}

@extends('layout')

@section('title', '画像変更')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('再登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('movie.ChangeImage') }}" enctype="multipart/form-data">
                      @csrf


                        {{-- イメージ画像表示 --}}
                        <div class="nav-item" style="text-align:center">
                          <img height="80px" src="{{ asset(Auth::user()->picture_path) }}" >
                        </div>
                        <br>


                        <div class="form-group row">
                                <label for="picture" class="col-md-3 col-form-label text-md-right">イメージ画像</label>
                            
                                <div class="col-md-6">
                                    <input id="picture" type="file" name="picture"
                                      class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}">
                                    {{-- @if ($errors->has('picture'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('戻る') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('再登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
