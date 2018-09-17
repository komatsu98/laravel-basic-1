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
use App\Province;


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

Route::post('/province', function(Request $request) {
    $province = new Province();
    $province->unit_id = $request->unit_id;
    $province->name = $request->name;
    $province->level = $request->level;
    $province->note = $request->note;
    $province->valid_date = $request->valid_date;
    $province->save();
});

Route::get('/province', function() {
   $provinces = \App\Province::all();

   return view('provinces.index', compact('provinces'));
});

Route::get('/province/{unit_id}', function($unit_id) {

//    $province = DB::table('provinces')->where('unit_id', $unit_id)->first();
    $province = \App\Province::where('unit_id', $unit_id)->first();

    return view('provinces.province', compact('province'));

});
