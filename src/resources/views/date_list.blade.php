@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/date_list.css') }}">
@endsection

@section('content')
    <form class="date__navigation" action="/attendance/per/date" method="get">
        @csrf
        <button class="date__change-button" name="prevDate"><</button>
        <input type="hidden" name="displayDate" value="{{ $displayDate }}">
        <p class="date__text">{{ $displayDate->format('Y-m-d') }}</p>
        <button class="date__change-button" name="nextDate">></button>
    </form>

    <div class="table">
        <table class="attendance__table">
                <tr>
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
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
