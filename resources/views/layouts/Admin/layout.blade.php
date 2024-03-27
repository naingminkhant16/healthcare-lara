<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="">
    @vite('resources/js/app.js')
</head>

<body>
    {{-- content section --}}
    <div class="" style="min-height: 100vh;">
        <div class="row g-0">
            <div class="col-md-2 ">
                <div class="p-3 sticky-md-top">
                    <h1 class="fs-3 text-primary text-center mt-3 fw-bold mb-3">
                        Admin Dashboard
                    </h1>
                    <hr>
                    <ul class="list-group">
                        <a href="{{route('admin.dashboard')}}"
                            class="list-group-item @if(request()->routeIs('admin.dashboard')) active text-white @else text-primary @endif">
                            <i class="bi bi-bar-chart"></i> Dashboard
                        </a>
                        <a class="list-group-item @if(request()->routeIs('events.index')) active text-white @else text-primary @endif"
                            href="{{route('events.index')}}">
                            <i class="bi bi-calendar2-event"></i> Events
                        </a>
                        <a class="list-group-item @if(request()->routeIs('')) active text-white @else text-primary @endif"
                            href="">
                            <i class="bi bi-book-half"></i> Articles
                        </a>
                        <a class="list-group-item @if(request()->routeIs('admin.users.index')) active text-white @else text-primary @endif"
                            href="{{route('admin.users.index')}}">
                            <i class="bi bi-person"></i> Users
                        </a>
                    </ul>
                    <hr>
                    <ul class="list-group">
                        <a class="list-group-item bg-white text-danger" href="{{route('public.home')}}">
                            <i class="bi bi-box-arrow-left"></i> Back To Home
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 border-start" style="min-height: 100vh">
                <div class="border-top sticky-top bg-white border-bottom mb-3 p-3">
                    <p class="mb-0 text-secondary w-100 text-end">Sign in as <span class="text-primary">
                            <i class="bi bi-person-fill"></i> {{auth()->user()->name}}</span></p>
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- footer section --}}

</body>

</html>