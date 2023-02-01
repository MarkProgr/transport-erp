@extends('layout')

@section('title', 'Driver')

@section('body')
    <div class="card text-center mt-5">
        <div class="card-header">
            <h5>{{ $driver->name }} {{ $driver->surname }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-text mt-3">Age: {{ $driver->age }}</h6>
            <h6 class="card-text mt-3">Email: {{ $driver->email }}</h6>
            <h6 class="card-text mt-2">Category: {{ $driver->category }}</h6>
            <h6 class="card-text mt-2">Status of this driver: {{ $driver->status }}</h6>
            <h6 class="card-text mt-5">Transport of this driver: {{ $driver->transport->name }}</h6>
            <a href="{{ route('drivers.edit', ['driver' => $driver->id]) }}" class="btn btn-primary mt-3">Edit info about this driver</a>
            <form class="mt-2" method="post" action="{{ route('drivers.destroy', ['driver' => $driver->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete this driver</button>
            </form>
        </div>
    </div>
    <a href="{{ route('drivers.index') }}" class="btn btn-dark">Go back</a>
@endsection
