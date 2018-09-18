<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvincesController extends Controller
{
    //
    public function index() {
        $provinces = Province::all();

        return view('provinces.index', compact('provinces'));
    }

    public function show($unit_id) {
        $province = Province::where('unit_id', $unit_id)->first();
        if(!$province) return "Không có mã đơn vị này!";

        return view('provinces.province', compact('province'));
    }

    public function create() {
        return view('layouts.admin');
    }

    public function store(Request $request) {
        $check = Province::where('unit_id', $request->unit_id)->first();
        if($check) return "Mã tỉnh đã tồn tại!";

        $province = new Province();
        $province->unit_id = $request->unit_id;
        $province->name = $request->name;
        $province->level = $request->level;
        $province->note = $request->note;
        $province->valid_date = Carbon::createFromFormat('d/m/Y', $request->valid_date)->format('Y-m-d');
        $province->save();

        return redirect('/provinces');
    }
}
