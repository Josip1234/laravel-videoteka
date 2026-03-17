@section('edit')
 <div class="flex items-center">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">Ažuriranje medija</h2>
    </div>
    <div class="flex items-center justify-center">
<form action="{{ route('medij.azuriraj',$medij) }}" class="space-y-5" method="post">
    @csrf
    @method('PUT')
    <label for="naziv" class="block text-gray-300 mb-2 text-sm font-medium">Naziv medija:</label>
    <p><input type="text" name="naziv" id="naziv" value="{{ old('naziv',$medij->naziv) }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"></p>
    @error('naziv')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    <input type="submit" value="Ažuriraj" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200 shadow-lg">
</form>
    </div>
@endsection