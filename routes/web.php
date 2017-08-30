<?php

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
use Illuminate\Pagination\LengthAwarePaginator;

Route::get('/', function () {
    // Get the tweets from the API
    $tweets = json_decode(file_get_contents(route('api.tweets')))->statuses;
    // Limit to 10 per page
    $perPage = 10;
    // Get the curent page
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    // Get the tweets for the current page
    $currentPageItems = array_slice($tweets, ($currentPage - 1) * $perPage, $perPage);
    // Pass the tweets paginator to the web view
    return view('tweets.index', ['tweets' => new LengthAwarePaginator($currentPageItems, count($tweets), $perPage)]);
});
