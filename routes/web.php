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

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\PostsController;


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

Route::get('/provinces', 'ProvincesController@index');

Route::get('/provinces/{unit_id}', 'ProvincesController@show');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
Route::prefix('admin')->group(function () {
    Route::post('/provinces', 'ProvincesController@store');
    Route::get('/provinces/create', 'ProvincesController@create');
    Route::get('/posts/create', 'PostsController@create');
    Route::post('/posts', 'PostsController@store');
});
