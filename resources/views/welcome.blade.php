<!DOCTYPE html>

<html>

<head>
    <title>PassData</title>
</head>

<body>
<ul>
    @foreach ($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
</ul>
</body>
</html>