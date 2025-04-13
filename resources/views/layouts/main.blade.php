<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('title')</title>
    @vite(['resources/css/bootstrap.scss', 'resources/css/app.css','resources/css/cart.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
      <!-- @vite(['resources/js/bootstrap.js']) -->
</head>
<body>
    <div class="w-100" style="position:absolute; z-index:10000;">
        @if(session('success'))
            <div class="alert alert-success fade show alert-dismissible" role="alert">
                {{session('success')}}
                <div class="btn-close" data-bs-dismiss="alert" arial-label="close"></div>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index:10000">
                <strong>Whoops! Something went wrong.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="" style="overflow-y:scroll; height:100vh">
        @yield('content')
    </div>
    <!-- @vite(['resources/js/bootstrap.js']) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>