@section('create')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Unos novog popisa</h2>
    </div>
<div class="flex items-center justify-center">
      <form action="{{ route('popis_posudjenih.spremi') }}" method="POST" class="space-y-5">
        @csrf
        <label for="datum_posudbe" class="block text-gray-300 mb-2 text-sm font-medium">Unos datuma posudbe:</label>
        <input type="date" name="datum_posudbe" id="datum_posudbe" value="{{ old('datum_posudbe') }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @error('datum_posudbe')
             <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
         <label for="datum_vracanja" class="block text-gray-300 mb-2 text-sm font-medium">Unos datuma vraćanja:</label>
         <input type="date" name="datum_vracanja" id="datum_vracanja" value="{{ old('datum_vracanja') }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
        @error('datum_vracanja')
             <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
         <label for="id_filma" class="block text-gray-300 mb-2 text-sm font-medium">Odaberi film</label>
         <select name="id_filma" id="id_filma" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                @foreach ($filmovi as $film)
                    <option value="{{ $film->id_filma }}" @selected(old('id_filma'))>{{ $film->naziv }}</option>
                @endforeach
         </select>
         @error('id_filma')
             <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Unos novog popisa</button>
      </form>
 </div>
@endsection