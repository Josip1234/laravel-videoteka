@section('ispis')
 <div class="mx-auto max-w-md overflow-hidden  shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">

      <div>
<table class="w-full text-sm text-left text-gray-300">
    <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
        <tr>
            <th class="px-6 py-4 text-center">Broj medija</th>
            <th class="px-6 py-4 text-center">Naziv medija</th>
            <th class="px-6 py-4 text-center">Akcije</th>
        </tr>
    </thead>
    <tbody  class="divide-y divide-gray-800">
        @foreach($medij as $md)
        <tr class="hover:bg-gray-800/60 transition duration-200">
            <td class="px-6 py-4 font-medium text-white">{{ $md->broj_medija }}</td>
            <td class="px-6 py-4 font-medium text-white">{{ $md->naziv }}</td>
            <td class="px-6 py-4 font-medium text-white"><a href="{{ route('medij.uredi',$md) }}"><i class="bi bi-pencil icon-edit"></i></a>
              <form action="{{ route('medij.izbrisi',$md) }}" method="post" onsubmit="return confirm('Želite li obrisati medij?')">
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