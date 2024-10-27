@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance_list.css') }}">
@endsection

@section('content')
    <form class="container" action="{{ route('per/user') }}" method="post">
        @csrf

        @if($displayUser != null)
            <p class="container__text">{{ $displayUser}} さんの勤怠表</p>
        @else
            <p class="container__text">ユーザーを選択してください</p>
        @endif

        <div class="search__item">
            <input class="search__input" type="text" name="search_name" placeholder="名前検索" value="{{ $searchParams['name'] ?? '' }}" list="user_list">
            <datalist id="user_list">
                @if($userList)
                    @foreach($userList as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                @endif
            </datalist>
            <button class="search__button">検索</button>
        </div>
    </form>

    <div class="table">
        <table class="attendance__table">
            <tr>
                <th>日付</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->date }}</td>
                    <td>{{ $user->start }}</td>
                    <td>{{ $user->end }}</td>
                    <td>{{ $user->total_rest }}</td>
                    <td>{{ $user->total_work }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
@endsection