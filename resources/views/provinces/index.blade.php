<!DOCTYPE html>

<html>

<head>
    <title>Đơn vị hành chính</title>
</head>

<body>
<ul>
    @foreach($provinces as $province)
        <a href="/province/{{ $province->unit_id }}">
            <li>{{ $province->unit_id}}. {{ $province->name}}</li>
        </a>
    @endforeach
</ul>
</body>
</html>