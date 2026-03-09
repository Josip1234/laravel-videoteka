@section('ispis')
<div class="mx-auto max-w-md overflow-hidden shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">
        <div>
            
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-center">Broj iskaznice</th>
                        <th class="px-6 py-4 text-center">Član</th>
                        <th class="px-6 py-4 text-center">Datum učlanjenja</th>
                        <th class="px-6 py-4 text-center">Akcije</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach ($clanska as $clan)
                        <tr class="hover:bg-gray-800/60 transition duration-200">
                        <td class="px-6 py-4 font-medium text-white">{{ $clan->broj_iskaznice }}</td>
                        <td class="px-6 py-4 font-medium text-white">{{ $clan->oib_clana }}</td>
                        <td class="px-6 py-4 font-medium text-white">{{ $clan->datum_uclanjenja->format("d.m.Y") }}</td>
                        <td class="px-6 py-4 font-medium text-white">
                            <a href="">Ažuriranje člana</a>
                            <button>Ispisivanje člana</button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <a href="{{ route('clanska_iskaznica.noviClan',$videoteka) }}">Dodaj novog člana</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
               @if(session('status'))
 
        <div class="mb-4 rounded bg-green-50 p-3 text-green-700">
          {{ session('status') }}
        </div>
         @endif
        </div>
    </div>
</div>