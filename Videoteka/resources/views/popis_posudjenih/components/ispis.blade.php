@section('ispis')
<h2>Popis filmova</h2>
<div class="mx-auto max-w-md overflow-hidden shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">
        <div>
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-center">Broj popisa</th>
                        <th class="px-6 py-4 text-center">Datum posudbe</th>
                        <th class="px-6 py-4 text-center">Datum vraćanja</th>
                        <th class="px-6 py-4 text-center">Ostalo dana</th>
                        <th class="px-6 py-4 text-center">Razlika u danima</th>
                        <th class="px-6 py-4 text-center">Film</th>
                        <th class="px-6 py-4 text-center">Akcije</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                        @foreach ($popis as $popis)
                            <tr class="hover:bg-gray-800/60 transition duration-200">
                                <td class="px-6 py-4 font-medium text-white">{{ $popis->brojPopisa }}</td>
                                 <td class="px-6 py-4 font-medium text-white">{{ $popis->datum_posudbe?->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $popis->datum_vracanja?->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{  ((((strtotime($popis->datum_vracanja)-strtotime(date('Y-m-d')))/60)/60)/24)}} dana</td>
                                <td class="px-6 py-4 font-medium text-white">{{ ((((strtotime($popis->datum_vracanja)-strtotime($popis->datum_posudbe))/60)/60)/24) }} dana</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $popis->id_filma }}</td>
                                <td class="px-6 py-4 font-medium text-white"><a href="{{ route('popis_posudjenih.azuriranje',$popis) }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('popis_posudjenih.obrisi',$popis) }}" method="post"
                                onsubmit="return confirm('Izbrisati zapis?')">
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