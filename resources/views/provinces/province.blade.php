<?php use Carbon\Carbon?>
        <!DOCTYPE html>
@extends ('layouts.master')
@section('content')
    <ul>
        <li>Mã Đơn Vị: {{ $province->unit_id }}</li>
        <li>Tên: {{ $province->name }}</li>
        <li>Cấp: {{ $province->level }}</li>
        <li>Ngày có hiệu lực: {{ Carbon::createFromFormat('Y-m-d', $province->valid_date)->format('d/m/Y') }}</li>
        <li>Ghi chú: {{ $province->note }}</li>
    </ul>
@endsection