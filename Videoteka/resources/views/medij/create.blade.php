<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Unos novog medija')</title>
</head>
<body>
    @include('medij.navigation.navigation')
    @include('medij.forms.create')
    @yield('navigation')
    @yield('create')
</body>
</html>