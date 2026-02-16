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

<body class="bg-neutral-950 text-neutral-100">
  <header>
    @include('navigation.navigation')
  </header>
    <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Unos nove videoteke</h2>
    </div>
    <div class="flex items-center justify-center">
          
      <form method="post" class="space-y-5">
        <label class="block text-gray-300 mb-2 text-sm font-medium">Unesi oib:</label>
        <input type="text" name="oib" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
          <label class="block text-gray-300 mb-2 text-sm font-medium">Unesi naziv videoteke:</label>
        <input type="naziv" name="naziv" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
           <label class="block text-gray-300 mb-2 text-sm font-medium">Unesi adresu videoteke:</label>
        <input type="adresa" name="adresa" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Spremi novu videoteku</button>
      </form>


    </div>


</body>

</html>