@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>ログイン</h1>
        <form action="/login" method="POST">
            @csrf
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

            <button type="submit" class="btn">ログイン</button>
        </form>

        <div class="login-link">
            <p>アカウントをお持ちでない方はこちらから</p>
            <a href="/register">会員登録</a>
        </div>
    </div>
@endsection
