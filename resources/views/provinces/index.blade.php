@extends ('layouts.master')

@section('content')
    @foreach($provinces as $province)
        <a href="/provinces/{{ $province->unit_id }}">
            <li>{{ $province->unit_id}}. {{ $province->name}}</li>
        </a>
    @endforeach
@endsection