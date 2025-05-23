<!-- 共通レイアウト -->


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      @yield('header')
      <a href="{{ route('items.index')}}">
      <img src="{{ asset('images/logo.svg') }}" class="header__image" alt="coachtechロゴ"></a>
      <form class="header-search" method="GET"
      action="{{ ($page ?? '') === 'mylist' ? url('/?page=mylist') : route('items.index') }}">
        <input type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
      </form>
      <nav class="header-nav">
          @if (Auth::check())
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="nav-link" style="background:none;border:none;padding:0;cursor:pointer;">
              ログアウト
          </button>
          @endif
          </form>
        <a href="{{ route('mypage')  }}" class="nav-link">マイページ</a>
        <a href="{{ route('sell.form')  }}" class="nav-link exhibit-btn">出品</a>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
    @yield('scripts')
  </main>
</body>

</html>
