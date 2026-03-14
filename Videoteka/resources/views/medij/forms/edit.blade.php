@section('edit')
<form action="{{ route('medij.azuriraj',$medij) }}" method="post">
    @csrf
    @method('PUT')
    <label for="naziv">Naziv medija:</label>
    <p><input type="text" name="naziv" id="naziv" value="{{ old('naziv',$medij->naziv) }}"></p>
    @error('naziv')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit" value="Ažuriraj">
</form>
@endsection