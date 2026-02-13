<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/css/style.css">
  @vite('resources/css/app.css')
  <title>@yield('title','Sustav posudbe filmova')</title>
</head>

<body>
  <header>
    @include('navigation.navigation')
  </header>

    <div class="md:flex">
      <form method="post">
        <input type="text" name="oib">
        <input type="naziv" name="naziv">
        <input type="adresa" name="adresa">
        <button type="submit">Spremi novu videoteku</button>
      </form>


    </div>


</body>

</html>