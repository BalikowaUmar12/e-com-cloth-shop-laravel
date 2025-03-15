<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}} | @yield('title')</title>
    @vite(['resources/css/bootstrap.scss','resources/js/bootstrap.js'])
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <div class="">
        @yield('content')
    </div>
</body>
</html>