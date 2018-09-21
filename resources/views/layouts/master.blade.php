<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="../../../../favicon.ico">--}}

    <title>Blog Template for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        @include('layouts.nav')

    </div>

    <main role="main" class="container">

        <div class="row">

            <div class="col-md-8 blog-main">
                @yield('content')
            </div>

            <aside class="col-md-4 blog-sidebar">
                @include('layouts.sidebar')
            </aside>
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>