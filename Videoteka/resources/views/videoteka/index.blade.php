<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
    <title>@yield('title','Sustav posudbe filmova')</title>
</head>

<body>
    <header>
        @include('navigation.navigation')
    </header>
  <div class="mx-auto max-w-md overflow-hidden  bg-white shadow-md md:max-w-2xl pt-6">
  <div class="md:flex">
    <div>
    <table class="table-auto md:table-fixed border-collapse border border-gray-400 border-separate md:border-separate">
        <thead>
            <tr>
                <th class="border border-gray-300">Oib</th>
                <th class="border border-gray-300">Naziv</th>
                <th class="border border-gray-300">Adresa</th>
                <!-- kod akcija ćemo dodati i prijava, napraviti ćemo kasnije middleware koji provjerava za modele dali postoji session
 prijava videoteke ak one postoji vratiti će se na videoteka index sa errorom -->
                <th class="border border-gray-300">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videoteka as $vid)
            <tr>
                <td class="border border-gray-300">{{ $vid->oib }}</td>
                <td class="border border-gray-300">{{ $vid->naziv }}</td>
                <td class="border border-gray-300">{{ $vid->adresa }}</td>
                <td class="border border-gray-300">
                    Prijava 
                    Uređivanje
                    Brisanje
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
      
    @if ($totalPages > 1)
<div class="pager">

  {{-- Previous --}}
  @if ($page > 1)
    <a href="?page={{ $page - 1 }}">&lt;</a>
  @else
    <span class="disabled">&lt;</span>
  @endif

  {{-- Page numbers --}}
  @for ($i = 1; $i <= $totalPages; $i++)
    @if ($i == $page)
      <span class="active">{{ $i }}</span>
    @else
      <a href="?page={{ $i }}">{{ $i }}</a>
    @endif
  @endfor

  {{-- Next --}}
  @if ($page < $totalPages)
    <a href="?page={{ $page + 1 }}">&gt;</a>
  @else
    <span class="disabled">&gt;</span>
  @endif

</div>
    </div>
  </div>
  </div>

@endif
</body>

</html>