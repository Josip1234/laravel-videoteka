<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Ažuriranje medija')</title>
</head>
<body>
    @include('medij.navigation.navigation')
    @include('medij.forms.edit')
    @yield('navigation')
    @yield('edit')
</body>
</html>