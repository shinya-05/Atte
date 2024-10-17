<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header__left">
            <span class="header__logo">
                Atte
            </span>
        </div>
        @if (Auth::check() && Auth::user()->email_verified_at)
            <div class="header__right">
                <ul class="header__right-list">
                    <li class="header__right-item">
                        <a class="header__item-link" href="/">ホーム</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('attendance/date') }}">日付一覧</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('user') }}">ユーザー一覧</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('attendance/user') }}">勤怠表</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('logout') }}">ログアウト</a>
                    </li>
                </ul>
            </div>
        @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer__item">
            <small class="footer__text">
                Atte,inc.
            </small>
        </div>
    </footer>
</body>

</html>