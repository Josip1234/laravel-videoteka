@section('ispis')
  <div class="mx-auto max-w-md overflow-hidden  shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">

      <div>
<table class="w-full text-sm text-left text-gray-300">
    <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
        <tr>
            <th class="px-6 py-4 text-center">Broj žanra</th>
            <th class="px-6 py-4 text-center">Naziv žanra</th>
            <th class="px-6 py-4 text-center">Akcije</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-800">
        @foreach ($zanrovi as $zanr)
            <tr class="hover:bg-gray-800/60 transition duration-200">
                <td class="px-6 py-4 font-medium text-white">{{ $zanr->broj_zanra }}</td>
                <td class="px-6 py-4 font-medium text-white">{{ $zanr->naziv }}</td>
                <td class="px-6 py-4 font-medium text-white"><a href="{{ route('zanr.uredi',$zanr) }}"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('zanr.brisanje',$zanr) }}" method="post" 
                onsubmit="return confirm('Želite li izbrisati zapis?')">
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