@extends('layout')

@section('title', 'Favor')

@section('body')
    <div class="card text-center mt-5">
        <div class="card-header">
            <h5>{{ $favor->name }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-text mt-3">{{ $favor->name }}</h6>
            <h6 class="card-text mt-3">Description: {{ $favor->description }}</h6>
            <h6 class="card-text mt-2">Sending point: {{ $favor->sending_point }}</h6>
            <h6 class="card-text mt-2">Destination point: {{ $favor->destination_point }}</h6>
            <h6 class="card-text mt-5">Cost of this service: {{ $favor->cost }}</h6>
            <h6 class="card-text mt-5">Transport which used: {{ $favor->transport->name }}</h6>
            <a href="{{ route('favors.edit', ['favor' => $favor->id]) }}" class="btn btn-primary mt-3">Edit this service</a>
            <form class="mt-2" method="post" action="{{ route('favors.destroy', ['favor' => $favor->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete this service</button>
            </form>
        </div>
    </div>
    <a href="{{ route('favors.index') }}" class="btn btn-dark">Go back</a>
@endsection
