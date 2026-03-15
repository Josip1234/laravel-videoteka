@section('edit')
<form action="{{ route('zanr.azuriraj',$zanr) }}" method="post">
    @csrf
    @method('put')
    <label for="naziv">Ažuriranje žanra:</label>
    <input type="text" name="naziv" id="naziv" value="{{ old('naziv',$zanr->naziv) }}">
    @error('naziv')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit" value="Ažuriraj žanr">
</form>
@endsection