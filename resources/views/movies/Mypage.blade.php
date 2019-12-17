@extends('layout')

@section('title', 'マイページ')

@section('content')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<header>
</header>

<br>

<body>
{{-- へッターの中に一時的にログイン・ログアウトできる機能をつける app.blade.php--}}

    {{-- <header>
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} 
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                              </div>
                          </li>
                     @endguest
                  </ul>
              </div>
          </div>
      </nav>
    </div>
  </header> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('プロフィール') }}
                    </div>
                    <div class="card-body">

{{-- イメージ画像表示 --}}
                        <a href="{!! action('MovieController@ChangeImage') !!}">
                            <div class="nav-item" style="text-align:center" button>
                                <img height="80px" src="{{ asset(Auth::user()->picture_path) }}" >
                            </div>
                        </a>
                        <div style="margin-top: 30px;">
                            <table class="table table-striped">
                                <tr>
                                    <th class="fas fa-address-card">
                                    {{ Auth::user()->name }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="fas fa-envelope">
                                    {{ Auth::user()->email }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="fas fa-comment-dots">
                                    {{ Auth::user()->comment }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                    <div class="nav-item dropdown"></div>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        ログアウト
                                        {{-- {{ Auth::user()->name }}  --}}
                                        <span class="caret"></span>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

@endsection