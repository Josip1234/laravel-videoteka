@section('ispis')
<table>
    <thead>
        <tr>
            <th>Broj žanra</th>
            <th>Naziv žanra</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($zanrovi as $zanr)
            <tr>
                <td>{{ $zanr->broj_zanra }}</td>
                <td>{{ $zanr->naziv }}</td>
                <td><a href="{{ route('zanr.uredi',$zanr) }}">Uredi</a>|
                <form action="{{ route('zanr.brisanje',$zanr) }}" method="post" 
                onsubmit="return confirm('Želite li izbrisati zapis?')">
                    @csrf
                    @method('delete')
                    <button type="submit">Izbriši</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection