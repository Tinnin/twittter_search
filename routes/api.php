<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tweets', function () {
    // Get last 50 tweets with hashtag "#London" and filter:safe
    // Cache results for 60 minutes
    return Cache::remember('tweets', 60, function() {
        return Twitter::getSearch(['q' => '#London filter:safe', 'count' => 50, 'format' => 'json']);
    });
})->name('api.tweets');
