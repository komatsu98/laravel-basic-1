@extends('layouts.master')

@section('content')

    <h1>Thêm tỉnh thành</h1>
    <hr>
    <form method="POST" action="/admin/provinces">

        @csrf

        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="unit_id">Mã đơn vị</label>
            <input type="text" class="form-control" id="unit_id" name="unit_id">
        </div>
        <div class="form-group">
            <label for="level">Cấp</label>
            <input type="text" class="form-control" id="level" name="level">
        </div>
        <div class="form-group">
            <label for="valid_date">Ngày có hiệu lực</label>
            <input type="text" class="form-control" id="valid_date" name="valid_date">
        </div>
        <div class="form-group">
            <label for="note">Ghi chú</label>
            <input type="text" class="form-control" id="note" name="note">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection