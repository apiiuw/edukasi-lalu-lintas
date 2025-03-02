<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
        {{-- <title>{{ isset($title) ? $title . 'Knowledge Management Hub' : 'Knowledge Management Hub' }}</title> --}}
        <title>EduLaluLintas</title>
        <link rel="icon" href="{{ asset('assets/images/logo/Jasa Raharja Logo Utama.png') }}">

        {{-- CDN --}}
        <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

        {{-- FONT --}}
        <link href="https://fonts.cdnfonts.com/css/neck-l-sans" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/new-sosis" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/comiccomoc" rel="stylesheet">

        {{-- ICON --}}
        <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-jakartaSans antialiased">
        @include('user.partials.navbar')
        @yield('container')
        @include('user.partials.footer')

        <script src="node_modules/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>