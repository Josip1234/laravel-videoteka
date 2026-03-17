@section('edit')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Ažuriranje filma</h2>
    </div>
     <div class="flex items-center justify-center">
<form action="{{ route('film.azuriraj',$film) }}" method="post" class="space-y-5">
    @csrf
    @method('PUT')
    <label for="naziv" class="block text-gray-300 mb-2 text-sm font-medium">Ažuriraj naziv:</label>
    <input type="text" name="naziv" id="naziv" value="{{ old('naziv',$film->naziv) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
    @error('naziv')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <label for="dostupneKolicine" class="block text-gray-300 mb-2 text-sm font-medium">Ažuriraj količinu:</label>
    <input type="number" name="dostupneKolicine" id="dostupneKolicine" min="1" step="1" value="{{ old('dostupneKolicine',$film->dostupneKolicine) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
    @error('dostupneKolicine')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <label for="broj_medija" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi medij:</label>
    <select name="broj_medija" id="broj_medija" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @foreach ($medij as $medij)
            <option value="{{ $medij->broj_medija }}" @selected(old('broj_medija',(int)$medij->broj_medija)==$film->broj_medija)>{{ $medij->naziv }}</option>
        @endforeach
    </select>
    @error('broj_medija')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <label for="broj_zanra" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi žanr filma:</label>
    <select name="broj_zanra" id="broj_zanra" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @foreach ($zanr as $zanr)
            <option value="{{ $zanr->broj_zanra }}" @selected(old('broj_zanra',(int)$zanr->broj_zanra)==$film->broj_zanra)>{{ $zanr->naziv }}</option>
        @endforeach
    </select>
    @error('broj_zanra')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Unos novog medija</button>
</form>
     </div>
@endsection