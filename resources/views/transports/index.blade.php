@extends('layout')

@section('title', 'Transports')

@section('body')
    <form class="mt-2" action="{{ route('transports.index') }}">
        <div>
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Technical status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transports as $transport)
        <tr>
            <td><a class="btn btn-dark" href="{{ route('transports.show', ['transport' => $transport->id]) }}">{{ $transport->name }}</a></td>
            <td>{{ $transport->type }}</td>
            <td>{{ $transport->status }}</td>
            <td>{{ $transport->technical_status }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $transports->links() !!}
    </div>
    <a class="btn btn-success" href="{{ route('transports.create') }}">Create new transport</a>
@endsection
