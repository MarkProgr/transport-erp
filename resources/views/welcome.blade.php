@extends('layout')

@section('title', 'Home')

@section('body')
    <h2 class="mt-5 text-center">Statistics</h2>
    <h4 class="mt-5">
        Count of successful orders:
        {{ $successfulOrders }}
    </h4>
    <h4 class="mt-3">
        Count of available drivers:
        {{ $countOfAvailableDrivers }}
    </h4>
    <h4 class="mt-3">
        Count of customers:
        {{ $countOfCustomers }}
    </h4>
    <h4 class="mt-3">
        Total count of our transport:
        {{ $countOfTransport }}
    </h4>
    <h4 class="mt-3">
        Count of our types of transport:
        {{ $countOfTypesOfTransport }}
    </h4>
@endsection
