@section('edit')
<form action="{{ route('vrsta.azuriraj',$vrsta) }}" method="post">
    @csrf
    @method('put')
   <label for="naziv">Ažuriraj naziv cjenika</label>
   <input type="text" name="naziv" id="naziv" value="{{ old('naziv',$vrsta->naziv) }}">
   @error('naziv')
        <p>{{ $message }}</p>
   @enderror
   <label for="opis">Ažuriraj opis vrste cijenika</label>
   <textarea name="opis" id="opis" cols="30" rows="10">
    {{ old('opis',$vrsta->opis) }}
   </textarea>
   @error('opis')
    <p>{{ $message }}</p>
   @enderror
   <button type="submit">Ažuriraj vrstu cijenika</button>
</form>
@endsection