@extends('layout')

@section('title', 'Customers')

@section('body')
    <form class="mt-2" action="{{ route('customers.index') }}">
        <div>
            <input type="text" name="customer" placeholder="Search customer">
            <button>Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">Date of deal</th>
            <th scope="col">Deadline</th>
            <th scope="col">Status of deal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->country }}</td>
                <td>{{ $customer->date_of_deal }}</td>
                <td>{{ $customer->deadline }}</td>
                <td>{{ $customer->status_of_deal }}</td>
                <td><a class="btn btn-dark" href="{{ route('customers.show', ['customer' => $customer->id]) }}">About</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $customers->links() !!}
    </div>
    <a class="btn btn-success" href="{{ route('customers.create') }}">Create new customer</a>
@endsection
