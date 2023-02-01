@extends('layout')

@section('title', 'Transport')

@section('body')
    <div class="card text-center mt-5">
        <div class="card-header">
            Transport {{ $transport->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name of transport: {{ $transport->name }}</h5>
            <h5 class="card-text mt-5">Transport status: {{ $transport->status }}</h5>
            <h5 class="card-text mt-5">Technical status of transport: {{ $transport->technical_status }}</h5>
            <a href="{{ route('transports.edit', ['transport' => $transport->id]) }}" class="btn btn-primary mt-3">Edit this transport</a>
            <form class="mt-2" method="post" action="{{ route('transports.destroy', ['transport' => $transport->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete this transport</button>
            </form>
        </div>
    </div>
    <a href="{{ route('transports.index') }}" class="btn btn-dark">Go to list of transport</a>
    <a href="{{ route('drivers.index') }}" class="btn btn-dark float-end">Go to list of drivers</a>
@endsection
