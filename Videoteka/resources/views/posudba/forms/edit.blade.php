@section('edit')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Uređivanje posudbe</h2>
    </div>
     <div class="flex items-center justify-center">
        <form action="{{ route('posudba.azuriraj',[$clanska_iskaznica,$posudba]) }}" method="post" class="space-y-5">
            @csrf
            @method('put')
            <label for="broj_iskaznice" class="block text-gray-300 mb-2 text-sm font-medium">Broj iskaznice</label>
                <input type="text" name="broj_iskaznice" id="broj_iskaznice" value="{{ old('broj_iskaznice',$clanska_iskaznica->broj_iskaznice) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" readonly>
                    @error('broj_iskaznice')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                  <label for="zakasnina" class="block text-gray-300 mb-2 text-sm font-medium">Unos zakasnine</label>
                <input type="number" name="zakasnina" id="zakasnina" min="0.00" step="0.11" value="{{ old('zakasnina',$posudba->zakasnina)}}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    @error('zakasnina')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                  <label for="brojPopisa" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi popis</label>
                    <select name="brojPopisa" id="brojPopisa" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        @foreach ($popis as $popis)
                            <option value="{{ $popis->brojPopisa }}" @selected(old('brojPopisa',(int)$popis->brojPopisa)==$posudba->brojPopisa)>{{ $popis->brojPopisa }}</option>
                        @endforeach
                    </select>
                    @error('brojPopisa')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror


                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Unos nove posudbe</button>
        </form>
         </div>
@endsection