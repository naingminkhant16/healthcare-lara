<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health Care</title>
    <link rel="stylesheet" href="">
    @vite('resources/js/app.js')
</head>

<body>

    {{-- navbar section --}}
    <x-navbar />
    {{-- content section --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- footer section --}}
    <div>
        <x-footer />
    </div>
</body>

</html>
