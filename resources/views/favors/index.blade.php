@extends('layout')

@section('title', 'Favors')

@section('body')
    <div class="d-flex justify-content-around">
        <form class="m-4" action="{{ route('favors.index') }}">
            <label class="mb-2" for="favor_price">Search by name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="favor" placeholder="Search favor">
                <button class="btn btn-outline-secondary">Button</button>
            </div>
        </form>
        <form class="m-4" action="{{ route('favors.index') }}">
            <label class="mb-2" for="favor_cost">Filter favor by price</label>
            <div class="d-flex flex-row">
                <select class="form-select" name="favor_cost">
                    <option value="desc">Descending order</option>
                    <option value="asc">Ascending</option>
                </select>
                <button class="btn btn-outline-secondary">Filter</button>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Sending point</th>
            <th scope="col">Destination point</th>
            <th scope="col">Cost</th>
            <th scope="col">Transport</th>
        </tr>
        </thead>
        <tbody>
        @foreach($favors as $favor)
            <tr>
                <td>{{ $favor->name }}</td>
                <td>{{ $favor->sending_point }}</td>
                <td>{{ $favor->destination_point }}</td>
                <td>{{ $favor->cost }}</td>
                <td><a href="{{ route('transports.show', ['transport' => $favor->transport->id]) }}">{{ $favor->transport->name }}</a></td>
                <td><a class="btn btn-dark" href="{{ route('favors.show', ['favor' => $favor->id]) }}">About</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $favors->links() !!}
    </div>
    <a class="btn btn-success" href="{{ route('choose.type.form') }}">Create new service</a>
@endsection
