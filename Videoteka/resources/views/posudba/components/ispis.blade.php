@section('ispis')
     <div class="flex items-center justify-center">
                <table class="w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-center">Broj posudbe</th>
                            <th class="px-6 py-4 text-center">Broj iskaznice</th>
                            <th class="px-6 py-4 text-center">Zakasnina</th>
                            <th class="px-6 py-4 text-center">Broj popisa</th>
                            <th class="px-6 py-4 text-center">Datum posudbe</th>
                            <th class="px-6 py-4 text-center">Datum vraćanja</th>
                            <th class="px-6 py-4 text-center">Akcije</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @foreach ($posudbe as $posudba)
                            <tr class="hover:bg-gray-800/60 transition duration-200">
                                <td class="px-6 py-4 font-medium text-white">{{ $posudba->broj_posudbe }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $posudba->broj_iskaznice }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $posudba->zakasnina }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $posudba->brojPopisa }}</td>
                                <td class="px-6 py-4 font-medium text-white">
                                    {{ $posudba->popisposudjenih->datum_posudbe->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 font-medium text-white">
                                    {{ $posudba->popisposudjenih->datum_vracanja->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 font-medium text-white"><a href="{{ route('posudba.novi',$clanska_iskaznica) }}">Nova posudba</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
     
@endsection
