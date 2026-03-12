<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/css/style.css">
   @vite('resources/css/app.css')
    <title>@yield('title','Kreiranje nove članske iskaznice')</title>
</head>
<body class="bg-neutral-950 text-neutral-100">
    <header>
        @include('clanska_iskaznica.navigation.navigation')
    </header>
    <div class="flex items-center">
        <h2 class="text-2xl font-bold text-white mb-6 text-center">
            Upis novog člana 
        </h2>
    </div>
    <div class="flex items-center justify-center">
                <form method="post" class="space-y-5" action="{{ route('clanska_iskaznica.novi',$videoteka) }}">
                   
         @csrf
        <label for="oib_videoteke" class="block text-gray-300 mb-2 text-sm font-medium">Oib videoteke</label>
        <input type="text" id="oib_videoteke" name="oib_videoteke" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
        value="{{old('oib',$videoteka->oib)}}" readonly>
        @error('oib_videoteke') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
           <label for="oib_clana" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi člana za upis</label>
           <select name="oib_clana" id="oib_clana" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
            <option value="-1">Odaberi</option>
            @foreach ($popisCl as $clan)
            <option value=" {{ $clan["oib"] }}" @selected(old("oib_clana"))> {{ $clan["ime"]." ".$clan["prezime"] }}</option>
          @endforeach
           </select>
           @error('oib_clana') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
         <label for="datum_uclanjenja" class="block text-gray-300 mb-2 text-sm font-medium">Datum učlanjenja</label>
         <input type="date" name="datum_uclanjenja" id="datum_uclanjenja" value="old('datum_uclanjenja')" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
         @error('datum_uclanjenja')
            <p class="text-red-600 text-sm">{{ $message }}</p>
         @enderror 
         <!-- random broj pa ime videoteke i opet random broj da bude unique -->
         <input type="hidden" name="broj_iskaznice" value="@php $var=str_replace(" ","",rand(1,999999).$videoteka->naziv.rand(1,26)) @endphp {{ $var }}">
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Upiši novog člana</button>
      </form>
    </div>
   
 
</body>
</html>