<div class="border-bottom p-3">
    <div class="container">
        <div class="row">
            <div class="col-7 col-md-8 d-md-flex align-items-md-center justify-content-md-start mb-1 mb-md-0">

                <a href="tel:+959952128" class="text-decoration-none me-3 text-primary d-block">
                    <small><i class="bi bi-telephone-fill"></i> Call: +959 952 128 314</small></a>

                <a href="mailto:tharkhant777@gmail.com" class="text-decoration-none me-3 text-primary d-block">
                    <small><i class="bi bi-envelope-fill"></i> tharkhant777@gmail.com</small></a>

                <span class="text-decoration-none text-primary d-block">
                    <small><i class="bi bi-geo-alt-fill"></i> Yangon, Myanmar</small></span>

            </div>

            <div
                class="col-5 col-md-4  d-flex justify-content-md-end align-items-md-center align-items-end justify-content-end">
                <a href="#" class="bg-primary text-white p-1  me-1"><small> <i class="bi bi-facebook"></i></small></a>
                <a href="#" class="bg-primary text-white p-1  me-1"><small> <i class="bi bi-twitter-x"></i></small></a>
                <a href="#" class="bg-primary text-white p-1  me-1"> <small> <i class="bi bi-linkedin"></i></small></a>
                <a href="#" class="bg-primary text-white p-1  me-1"> <small> <i class="bi bi-instagram"></i></small></a>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-body-white  border-bottom sticky-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand  text-primary rounded-3" href="{{route('public.home')}}"><i
                class="bi bi-hospital fs-3"></i> </a>
        <div class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  m-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('public.home')) active text-primary @endif "
                        aria-current="page" href="{{route('public.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('public.about-us')) active text-primary @endif"
                        href="{{route('public.about-us')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if(request()->routeIs('public.articles')) active text-primary @endif"
                        href="{{route('public.articles')}}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('public.events')) active text-primary @endif"
                        href="{{route('public.events')}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('public.contact-us')) active text-primary @endif"
                        href="{{route('public.contact-us')}}">Contact</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('loginForm')) active text-primary @endif"
                        href="{{route('loginForm')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('registerForm')) active text-primary @endif"
                        href="{{route('registerForm')}}">Register</a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <small class="nav-link dropdown-toggle mb-0 d-inline-block" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">
                        <span class="text-primary">
                            <i class="bi bi-person-fill"></i>{{auth()->user()->name}}
                        </span>
                    </small>
                    <ul class="dropdown-menu">
                        <li>
                            <button type="submit" class="p-1 ps-3 dropdown-item border-0 bg-white nav-link text-danger"
                                form="logout">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </li>
                        @if (!auth()->user()->is_admin)
                        <li>
                            <a href="{{route('users.enrolled.events',auth()->id())}}" class="dropdown-item"><i
                                    class="bi bi-calendar-event me-1"></i>Enrolled
                                Events</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if (auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="bi bi-bar-chart me-1"></i>
                        Dashboard</a>
                </li>
                @endif
                <form action="{{route('logout')}}" method="POST" id="logout" class="d-none">
                    @csrf
                </form>
                @endauth

            </ul>
            <div>
                <form class="d-flex" action="{{route('public.search')}}" role="search" method="GET">
                    <input class="form-control form-control-sm me-1" type="search"
                        placeholder="Search events or articles..." aria-label="Search" name="search">
                    <button class="btn btn-primary btn-sm" type="submit">
                        <i class="bi bi-search text-white"></i></button>
                </form>
            </div>
        </div>
    </div>
</nav>