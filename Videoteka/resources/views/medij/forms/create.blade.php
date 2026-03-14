@section('create')
<form action="{{ route('medij.spremi') }}" method="post">
    @csrf
    <label for="naziv">Naziv medija</label>
    <p><input type="text" name="naziv" id="naziv" value="{{ old('naziv') }}"></p>
    @error('naziv')
       <p> {{ $message }} </p>
    @enderror
    <input type="submit" value="Unesi novi medij">
</form>
@endsection