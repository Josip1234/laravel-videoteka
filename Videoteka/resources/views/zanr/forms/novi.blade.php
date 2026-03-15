@section('unos')
<form action="{{ route('zanr.spremi') }}" method="post">
    @csrf
    <label for="naziv">Unos novog žanra</label>
    <input type="text" name="naziv" id="naziv" value="{{ old('naziv') }}">
     @error('naziv')
        <p>{{ $message }}</p>
     @enderror
     <button type="submit">Unesi novi žanr</button>
</form>
@endsection