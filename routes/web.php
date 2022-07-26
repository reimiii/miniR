<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([ 'verify' => true ]);

Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {

    Route::get('/home', [
        App\Http\Controllers\HomeController::class,
        'index'
    ])->name('home');

    Route::resource('communities', App\Http\Controllers\CommunityController::class);

    Route::resource('communities.posts', App\Http\Controllers\PostController::class);

    Route::get('posts/{post_id}/vote/{vote}', [
        App\Http\Controllers\PostVoteController::class,
        'store'
    ])->name('posts.vote');

});

