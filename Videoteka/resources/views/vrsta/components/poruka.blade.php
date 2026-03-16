@section('status')
@if(session('status'))
    <p>{{ session('status') }}</p>
@endif
@endsection