<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Ažuriranje medija')</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-neutral-950 text-neutral-100">
    @include('medij.navigation.navigation')
    @include('medij.forms.edit')
    @yield('navigation')
    @yield('edit')
</body>
</html>