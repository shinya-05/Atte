@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>会員登録</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="名前" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="パスワード" required>
                @error('password')
                    <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="確認用パスワード" required>
            </div>

            <button type="submit" class="btn">会員登録</button>
        </form>

        <div class="login-link">
            <p>アカウントをお持ちでない方はこちらから</p>
            <a href="/login">ログイン</a>
        </div>
    </div>
@endsection
