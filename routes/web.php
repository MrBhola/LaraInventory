<?php


Route::get('/', function () {
    return redirect()->to('/dashboard');
});

Auth::routes();

// Route::get('{parh}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');
Route::fallback(function () {
    return view('home');
});
