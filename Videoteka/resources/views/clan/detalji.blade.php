<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Sustav posudbe filmova')</title>
</head>

<body class="bg-neutral-950 text-neutral-100">
    @include('clan.components.navigation')
    <div class="flex items-center">
        <h2 class="text-2xl font-bold text-white mb-6 text-center">
            Detalji člana
        </h2>

    </div>
    <div class="flex items-center justify-center">
        <table class="w-full text-sm text-left text-gray-300">
            <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-center">Oib:</th>
                    <th class="px-6 py-4 text-center">Ime:</th>
                    <th class="px-6 py-4 text-center">Prezime:</th>
                    <th class="px-6 py-4 text-center">Adresa:</th>
                    <th class="px-6 py-4 text-center">Email:</th>
                    <th class="px-6 py-4 text-center">Broj telefona:</th>
                    <th class="px-6 py-4 text-center">Spol:</th>
                    <th class="px-6 py-4 text-center">Datum rođenja:</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <tr class="hover:bg-gray-800/60 transition duration-200">
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->oib }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->ime }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->prezime }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->adresa }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->email }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->broj_telefona }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->spol === 'm' ? 'Muški' : 'Ženski' }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $clanovi->datumRodjenja?->format('d.m.Y') }}</td>
                </tr>
            </tbody>

        </table>





    </div>
</body>

</html>
