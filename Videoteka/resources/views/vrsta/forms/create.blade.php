@section('create')
<form action="{{ route('vrsta.spremi') }}" method="post">
    @csrf
    <label for="naziv">Naziv nove vrste</label>
    <input type="text" name="naziv" id="naziv" value="{{ old('naziv') }}">
    @error('naziv')
        <p>{{ $message }}</p>
    @enderror
    <label for="opis">Opis nove vrste cjenika</label>
    <textarea name="opis" id="opis" cols="30" rows="10">
        {{ old('opis') }}
    </textarea>
    @error('opis')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Kreiraj novu vrstu cjenika</button>
</form>
@endsection