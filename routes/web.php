<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('pub-home');

/* Route for the new member form. */
Route::get('/new-member', function () {
    return view('new-member');
})->name('member.entry');

/* Route for posting new member information from the new member form. */
Route::post('/new-member', function () {
    return view('index');
})->name('member.create');
