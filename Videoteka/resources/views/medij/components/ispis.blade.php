@section('ispis')
<table>
    <thead>
        <tr>
            <th>Broj medija</th>
            <th>Naziv medija</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medij as $md)
        <tr>
            <td>{{ $md->broj_medija }}</td>
            <td>{{ $md->naziv }}</td>
            <td><a href="{{ route('medij.uredi',$md) }}">Uredi</a></td>
            <td>
            <form action="{{ route('medij.izbrisi',$md) }}" method="post" onsubmit="return confirm('Želite li obrisati medij?')">
                @csrf
                @method('delete')
                <input type="submit" value="Brisanje medija">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection