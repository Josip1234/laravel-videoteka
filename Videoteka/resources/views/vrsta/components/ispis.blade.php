@section('ispis')
  <div class="mx-auto max-w-md overflow-hidden  shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">

      <div>
<table class="w-full text-sm text-left text-gray-300">
    <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
        <tr>
            <th class="px-6 py-4 text-center">Broj vrste cijenika</th>
            <th class="px-6 py-4 text-center">Naziv cijenika</th>
            <th class="px-6 py-4 text-center">Opis cijenika</th>
            <th class="px-6 py-4 text-center">Akcije</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-800">
        @foreach($vrsta as $vrsta)
            <tr class="hover:bg-gray-800/60 transition duration-200">
                <td class="px-6 py-4 font-medium text-white">{{ $vrsta->id_vrste_cjenika }}</td>
                <td class="px-6 py-4 font-medium text-white">{{ $vrsta->naziv }}</td>
                <td class="px-6 py-4 font-medium text-white">{{ $vrsta->opis }}</td>
                <td class="px-6 py-4 font-medium text-white">
                    <a href="{{ route('vrsta.azuriranje',$vrsta) }}"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('vrsta.izbrisi',$vrsta) }}" method="post" onsubmit="return confirm('Želite li obrisati trenutnu vrstu cjenika?')">
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
@endsection