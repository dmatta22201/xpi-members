<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewMemberController;

Route::get('/', function () {
    return view('index');
})->name('pub-home');

/* New Member Routes that can be accessed anonymously */
Route::get(
    '/NewMemberPage',
    [NewMemberController::class, 'create']
)->name('member.create');

Route::post(
    '/NewMemberStore',
    [NewMemberController::class, 'store']
)->name('member.store');

Route::get(
    '/NewMemberNextSteps',
    [NewMemberController::class, 'success']
)->name('member.success');
