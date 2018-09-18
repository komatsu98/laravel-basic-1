<!DOCTYPE html>

<html>

<head>
    <title>Đơn vị hành chính</title>
</head>

<body>
<ul>
    <li>Mã Đơn Vị: {{ $province->unit_id }}</li>
    <li>Tên: {{ $province->name }}</li>
    <li>Cấp: {{ $province->level }}</li>
    <li>Ngày có hiệu lực: {{ $province->valid_date}}</li>
    <li>Ghi chú: {{ $province->note }}</li>
</ul>
</body>
</html>