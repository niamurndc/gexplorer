<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEXplorer</title>

    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- toaster -->
    <link rel="stylesheet" href="{{asset('assets/css/toaster.min.css')}}">
</head>
<body class="bg-dark text-light">

    <!-- Navbar start -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark border-bottom border-secondary shadow">
        <div class="container">
            <a class="navbar-brand" href="{{route('dashboard')}}">GEXplorer</a>

            <div>
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm border-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar end -->



    <main class="container py-4">
        @yield('content')
    </main>
    
    <!-- jquery -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- toaster -->
    <script src="{{asset('assets/js/toaster.min.js')}}"></script>

    @if(Session::has('message'))
    <script>
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.success("{{ session('error') }}");
    </script>
    @endif
</body>
</html>