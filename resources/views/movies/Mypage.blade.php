<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', 'マイページ')

@section('content')
<body>
{{-- へッターの中に一時的にログイン・ログアウトできる機能をつける app.blade.php--}}
    <header>
      <div class="row">
            <h1 class="title">Movie Translator</h1>
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
                <ul class="navbar-nav mr-auto">

                </ul>

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
                                {{ Auth::user()->name }} <span class="caret"></span>
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
  </header>

  <h3>プロフィール</h3>


{{-- イメージ画像表示 --}}
    <li class="nav-item">
        <img height="80px" src="{{ asset(Auth::user()->picture_path) }}" >
    </li>



<div style="margin-top: 30px;">
   
<table class="table table-striped">  
<tr>
<th>氏名</th>
<td>{{ Auth::user()->name }}</td>
</tr>  
<tr>
<th>メールアドレス</th>
<td>{{ Auth::user()->email }}</td>
</tr>  
<tr>
<th>コメント</th>
<td>{{ Auth::user()->comment }}</td>
</tr>
</table>
 
</div>
{{-- へッターの中に一時的にログイン・ログアウトできる機能をつける app.blade.php--}}
 @yield('content')
 <footer>

   {{-- <div class="footer">
      <i class="fas fa-home icons"></i>
      <i class="fas fa-search icons"></i>
      <i class="far fa-heart icons"></i>
      <i class="far fa-user icons"></i>
   </div> --}}
 </footer>
 @endsection