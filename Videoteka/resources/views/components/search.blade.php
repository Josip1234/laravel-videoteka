@section('search')
<div class="flex items-center justify-center">
<form class="space-y-5" method="GET" action="{{ route('videoteka.pocetna') }}">
    <label for="videoteka" class="block text-gray-300 mb-2 text-sm font-medium"></label>
<input type="text" name="videoteka" placeholder="Pretraga" id="videoteka" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
<button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Pretraži</button>
</form>
</div>