@extends ('layouts.master')

@section('content')

    @if(!auth()->id())
        <button type="button" class="btn btn-primary disabled">Sign In to Add Province</button>
    @else
        <a href="/admin/provinces/create">
            <button type="button" class="btn btn-primary">Add Province</button>
        </a>
    @endif
    <hr>
    @foreach($provinces as $province)
        <a href="/provinces/{{ $province->unit_id }}">
            <li>{{ $province->unit_id}}. {{ $province->name}}</li>
        </a>
    @endforeach
@endsection