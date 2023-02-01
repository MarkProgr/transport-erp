@extends('layout')

@section('title', 'Customer')

@section('body')
    <div class="card text-center mt-5">
        <div class="card-header">
            <h5>{{ $customer->name }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-text mt-3"><strong>Country:</strong> {{ $customer->country }}</h6>
            <h6 class="card-text mt-3"><strong>Date of deal:</strong> {{ $customer->date_of_deal }}</h6>
            <h6 class="card-text mt-2"><strong>Deadline:</strong> {{ $customer->deadline }}</h6>
            <h6 class="card-text mt-2"><strong>Status of deal:</strong> {{ $customer->status_of_deal }}</h6>
            <h6 class="card-text mt-5"><strong>Favors:</strong>
                @foreach($customer->favors as $favor)
                <h6>{{ $favor->name }}</h6>
                @endforeach
            </h6>
            @if($customer->status_of_deal !== 'Done')
            <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-primary mt-3">Edit this customer</a>
            @endif
            <form class="mt-2" method="post" action="{{ route('customers.destroy', ['customer' => $customer->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete this customer</button>
            </form>
        </div>
    </div>
    <a href="{{ route('customers.index') }}" class="btn btn-dark">Go back</a>
@endsection
