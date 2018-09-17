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
use \App\Http\Controllers\ProvinceController;


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

Route::get('/province', 'ProvinceController@index');

Route::get('/province/{unit_id}', 'ProvinceController@get_province_by_unit_id');

Route::get('/frontend', function() {
    return view('provinces.frontend');
});

Route::prefix('admin')->group(function () {
    Route::post('/province', 'ProvinceController@add_province');
});
