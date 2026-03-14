<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Medij početna stranica')</title>
</head>
<body>
    @include('medij.navigation.navigation')
    @include('medij.components.ispis')
    @include('medij.components.poruka')
    @yield('navigation')
    @yield('ispis')
    @yield('poruka')
</body>
</html>