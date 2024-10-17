<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/'); // 認証後のリダイレクト先を設定
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//ログインホーム
Route::get('/',[AttendanceController::class,'punch'])
    ->middleware('auth','verified');

// 打刻機能
Route::post('/work', [AttendanceController::class, 'work'])
    ->name('work');

// ログアウト
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// 管理ページ / 日付別
Route::get('/attendance/date', [AttendanceController::class, 'indexDate'])
    ->name('attendance/date');
Route::post('/attendance/date', [AttendanceController::class, 'perDate'])
    ->name('per/date');

// 管理ページ / ユーザー別
Route::get('/attendance/user', [AttendanceController::class, 'indexUser'])
    ->name('attendance/user');
Route::post('/attendance/user', [AttendanceController::class, 'perUser'])
    ->name('per/user');

// 管理ページ / ユーザー一覧
Route::get('/user', [AttendanceController::class, 'user'])
    ->name('user');