<?php


Route::get('/', function () {
    return redirect()->to('/intro');
});

Auth::routes(['register' => false]);

Route::get('{parh}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');
Route::fallback(function () {
    return view('home');
});
