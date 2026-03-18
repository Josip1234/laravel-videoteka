
@section('ispis')
<div class="mx-auto max-w-md overflow-hidden shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">
        <div>
            
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-center">Broj cjenika</th>
                        <th class="px-6 py-4 text-center">Film</th>
                        <th class="px-6 py-4 text-center">Videoteka</th>
                        <th class="px-6 py-4 text-center">Cijena filma</th>
                        <th class="px-6 py-4 text-center">Vrsta cjenika</th>
                        <th class="px-6 py-4 text-center">Akcije</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                     @foreach ($cjenik as $cj)
                             
                        <tr class="hover:bg-gray-800/60 transition duration-200">
                        <td class="px-6 py-4 font-medium text-white">{{ $cj->id_cjenika }}</td>
                        <td class="px-6 py-4 font-medium text-white"> {{ $cj->naziv_filma }} </td>
                        <td class="px-6 py-4 font-medium text-white">{{ $cj->videoteka->naziv }}</td>
                         <td class="px-6 py-4 font-medium text-white">{{ $cj->cijena_filma }}</td>
                          <td class="px-6 py-4 font-medium text-white">{{ $cj->naziv_vrste_cjenika }}</td>
                        <td class="px-6 py-4 font-medium text-white">

                                
                             <a href="{{ route('cjenik.noviCjenik',$cj->oib_videoteke) }}" aria-current="page"
                            class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white"><i class="bi bi-file-plus"></i>

                            </a>
                            
                            <a href="{{ route('cjenik.azuriraj',[$cj->oib_videoteke,$cj]) }}"><i class="bi bi-pencil-square"></i>
</a></a>
                             <form action="" method="post" onsubmit="return confirm('Obrisati cjenik?');">
                                @csrf
                                @method('delete')
                                <button type="submit"  ><i class="bi bi-trash icon-delete"></i></button>
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