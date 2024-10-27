@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>

        <form action="/work" class="form_button" method="post">
            @csrf
            <div class="button">
                @if($status == 0)
                    <button class="btn" type="submit" name="start_work">勤務開始</button>
                @else
                    <button class="btn" type="submit" name="start_work" disabled>勤務開始</button>
                @endif
            </div>
            <div class="button">
                @if($status == 1)
                    <button class="btn" type="submit" name="end_work">勤務終了</button>
                @else
                    <button class="btn" type="submit" name="end_work" disabled>勤務終了</button>
                @endif
            </div>
            <div class="button">
                @if($status == 1)
                    <button class="btn" type="submit" name="start_rest">休憩開始</button>
                @else
                    <button class="btn" type="submit" name="start_rest" disabled>休憩開始</button>
                @endif
            </div>
            <div class="button">
                @if($status == 2)
                    <button class="btn" type="submit" name="end_rest">休憩終了</button>
                @else
                    <button class="btn" type="submit" name="end_rest" disabled>休憩終了</button>
                @endif
            </div>
        </form>
    </div>
@endsection
