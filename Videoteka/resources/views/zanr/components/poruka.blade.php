@section('status')
@if(session('status'))
  <div class="mb-4 rounded bg-green-50 p-3 text-green-700">
          {{ session('status') }}
        </div>
@endif
@endsection