@section('ispis')
<table>
    <thead>
        <tr>
            <th>Broj vrste cijenika</th>
            <th>Naziv cijenika</th>
            <th>Opis cijenika</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vrsta as $vrsta)
            <tr>
                <td>{{ $vrsta->id_vrste_cjenika }}</td>
                <td>{{ $vrsta->naziv }}</td>
                <td>{{ $vrsta->opis }}</td>
                <td>
                    <a href="{{ route('vrsta.azuriranje',$vrsta) }}">Ažuriranje vrste cjenika</a>
                    <form action="{{ route('vrsta.izbrisi',$vrsta) }}" method="post" onsubmit="return confirm('Želite li obrisati trenutnu vrstu cjenika?')">
                        @csrf
                        @method('delete')
                        <button type="submit">Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection