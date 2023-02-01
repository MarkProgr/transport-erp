@extends('layout')

@section('title', 'Drivers')

@section('body')
    <div class="d-flex justify-content-between">
        <form class="mt-2" action="{{ route('drivers.index') }}">
            <div>
                <input type="text" name="search_driver" placeholder="Search driver">
                <button>Search</button>
            </div>
        </form>
        <form class="mt-2" action="{{ route('drivers.index') }}">
            <div>
                <input type="text" name="search_driver_by_car" placeholder="Name of car">
                <button>Search</button>
            </div>
        </form>
    </div>
    <table class="table table-success table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Age</th>
            <th scope="col">Status</th>
            <th scope="col">Email</th>
            <th scope="col">Current Transport</th>
        </tr>
        </thead>
        <tbody>
        @foreach($drivers as $driver)
            <tr>
                <td><a class="btn btn-dark" href="{{ route('drivers.show', ['driver' => $driver->id]) }}">{{ $driver->name }}</a></td>
                <td>{{ $driver->surname }}</td>
                <td>{{ $driver->age }}</td>
                <td>{{ $driver->status }}</td>
                <td>{{ $driver->email }}</td>
                <td><a class="link-dark" href="{{ route('transports.show', ['transport' => $driver->transport->id]) }}">{{ $driver->transport->name }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $drivers->links() !!}
    </div>
    <a class="btn btn-info" href="{{ route('drivers.create') }}">Add new driver</a>
@endsection
