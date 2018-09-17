<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    //
    public function index() {
        $provinces = Province::all();

        return view('provinces.index', compact('provinces'));
    }

    public function get_province_by_unit_id($unit_id) {
        $province = Province::where('unit_id', $unit_id)->first();
        if(!$province) return "Không có mã đơn vị này!";

        return view('provinces.province', compact('province'));
    }

    public function add_province(Request $request) {
        $province = new Province();
        $province->unit_id = $request->unit_id;
        $province->name = $request->name;
        $province->level = $request->level;
        $province->note = $request->note;
        $province->valid_date = $request->valid_date;
        $province->save();
    }
}
