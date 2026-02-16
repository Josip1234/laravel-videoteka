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

<body class="bg-neutral-950 text-neutral-100">
  <header>
    @include('navigation.navigation')
  </header>
  <div class="mx-auto max-w-md overflow-hidden  shadow-md md:max-w-2xl pt-6 bg-neutral-950 text-neutral-100">
    <div class="md:flex">
      @if(session('status'))
      <div class="mb-4 rounded bg-green-50 p-3 text-green-700">
        {{ session('status') }}
      </div>
      @endif
      <div>
        <table class="w-full text-sm text-left text-gray-300">
          <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
            <tr>
              <th class="px-6 py-4 text-center">Oib</th>
              <th class="px-6 py-4 text-center">Naziv</th>
              <th class="px-6 py-4 text-center">Adresa</th>
              <!-- kod akcija ćemo dodati i prijava, napraviti ćemo kasnije middleware koji provjerava za modele dali postoji session
 prijava videoteke ak one postoji vratiti će se na videoteka index sa errorom -->
              <th class="px-6 py-4 text-center">Akcije</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-800">
            @foreach($videoteka as $vid)
            <tr class="hover:bg-gray-800/60 transition duration-200">
              <td class=class="px-6 py-4 font-medium text-white">{{ $vid->oib }}</td>
              <td class="px-6 py-4 font-medium text-white">{{ $vid->naziv }}</td>
              <td class="px-6 py-4 font-medium text-white">{{ $vid->adresa }}</td>
              <td class="px-6 py-4 font-medium text-white">
                Prijava
                Uređivanje
                Brisanje
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>
                <a href="{{route('videoteka.create')}}"
                  class="text-grey-600 hover:none buttonadd">
                   <i class="bi bi-plus-square"></i>
                   <i class="bi bi-shop"></i>
                </a>

            </tr>
          </tfoot>
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
            @if ($i==$page)
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