@section('edit')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Ažuriranje cijenika</h2>
    </div>
     <div class="flex items-center justify-center">
<form action="{{ route('cjenik.update',$cjenik) }}" method="post" class="space-y-5">
    @csrf
    @method('put')
  <label for="id_filma" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi film:</label>
    <select name="id_filma" id="id_filma" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @foreach ($filmovi as $film)
            <option value="{{ $film->id_filma }}" @selected(old('id_filma',(int)$film->id_filma)==$cjenik->id_filma)>{{ $film->naziv }}</option>
        @endforeach
    </select>
   
    @error('id_filma')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror



    <label for="oib_videoteke" class="block text-gray-300 mb-2 text-sm font-medium">Oib videoteke</label>
    <input type="text" name="oib_videoteke" id="oib_videoteke" value="{{ old('oib_videoteke',$videoteka->oib) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" readonly>
    @error('oib_videoteke')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <label for="cijena_filma" class="block text-gray-300 mb-2 text-sm font-medium">Unesi cijenu filma:</label>
    <input type="number" name="cijena_filma" id="cijena_filma" min="0.01" step="0.10" value="{{ old('cijena_filma',$cjenik->cijena_filma) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
    @error('cijena_filma') 
        <p class="text-red-600 text-sm">{{ $message }}</p>       
    @enderror
          <label for="id_vrste_cjenika" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi vrstu cjenika:</label>
        <select name="id_vrste_cjenika" id="id_vrste_cjenika" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @foreach ($vrsta as $vrsta)
            <option value="{{ $vrsta->id_vrste_cjenika }}" @selected(old('id_vrste_cjenika',(int)$vrsta->id_vrste_cjenika)==$cjenik->id_vrste_cjenika)>{{ $vrsta->naziv }}</option>
        @endforeach
    </select>
    @error('id_vrste_cjenika')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
   
    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Unos novog medija</button>
</form>
     </div>
@endsection