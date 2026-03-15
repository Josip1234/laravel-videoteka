@section('navigation')
<ul>
    <li><a href="{{ route('videoteka.pocetna') }}">Početna stranica videoteke</a></li>
    <li><a href="{{ route('zanr.noviZanr') }}">Unos novog žanra</a></li>
        <li><a href="{{ route('zanr.pocetna') }}">Povratak na početnu stranicu žanra</a></li>

</ul>
@endsection