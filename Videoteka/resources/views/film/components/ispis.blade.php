@section('ispis')
  <div class="mx-auto max-w-md overflow-hidden  shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">

      <div>
<table class="w-full text-sm text-left text-gray-300">
    <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
        <tr>
            <th class="px-6 py-4 text-center">Broj filma</th>
            <th class="px-6 py-4 text-center">Naziv</th>
            <th class="px-6 py-4 text-center">Dostupne količine</th>
            <th class="px-6 py-4 text-center">Medij</th>
            <th class="px-6 py-4 text-center">Žanr</th>
            <th class="px-6 py-4 text-center">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($film as $film)
            <tr>
                <td>{{ $film->id_filma }}</td>
                <td>{{ $film->naziv }}</td>
                <td>{{ $film->dostupneKolicine }}</td>
                <td>{{ $film->nm }}</td>
                <td>{{ $film->nz }}</td>
                <td><a href="{{ route('film.edit',$film) }}"><i class="bi bi-pencil icon-edit"></i></a>
                <form action="{{ route('film.obrisi',$film) }}" method="post" onsubmit="return confirm('Obrisati film?');">
                    @csrf
                    @method('delete')
                    <button type="submit"><i class="bi bi-trash icon-delete"></i></button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
      </div>
    </div>
  </div>
@endsection