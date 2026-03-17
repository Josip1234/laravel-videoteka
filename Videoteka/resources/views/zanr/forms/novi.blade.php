@section('unos')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Unos novog žanra</h2>
    </div>
        <div class="flex items-center justify-center">
<form action="{{ route('zanr.spremi') }}" method="post" class="space-y-5">
    @csrf
    <label for="naziv" class="block text-gray-300 mb-2 text-sm font-medium">Unos novog žanra</label>
    <input type="text" name="naziv" id="naziv" value="{{ old('naziv') }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
     @error('naziv')
        <p class="text-red-600 text-sm">{{ $message }}</p>
     @enderror
     <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">Unesi novi žanr</button>
</form>
        </div>
@endsection