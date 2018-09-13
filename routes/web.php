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

Route::get('/', function () {

    $tasks = [
      'The first task',
      'The second task',
      'The final task',
    ];

    return view('welcome', compact('tasks'));
});

Route::get('/my_cv', function() {

    $data = [
        'name' => "Hồ Anh Tiến",
        'age' => 20,
        'address' => 'Hanoi',
        'university' => 'HUST',
        'skills' => 'HTML, CSS, JS, PHP, Laravel'
    ];

    return view('cv', $data);

});
