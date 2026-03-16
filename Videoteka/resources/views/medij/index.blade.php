<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
    <title>@yield('title','Medij početna stranica')</title>
</head>
<body class="bg-neutral-950 text-neutral-100">
    @include('medij.navigation.navigation')
    @include('medij.components.ispis')
    @include('medij.components.poruka')
    @yield('navigation')
    @yield('ispis')
    @yield('poruka')
</body>
</html>