@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user_list.css') }}">
@endsection

@section('content')
    <div class="container">
        <p class="container__text">社員一覧</p>
    </div>
    <div class="table">
        <table class="attendance__table">
            <tr>
                <th>名前</th>
                <th>Email</th>
                <th>勤務状態</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->status == 1)
                        <td>勤務中</td>
                    @elseif($user->status == 2)
                        <td>休憩中</td>
                    @elseif($user->status == 3)
                        <td>退勤</td>
                    @else
                        <td>その他</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
@endsection