@extends('layout')

@section('title', 'Edit driver')

@section('body')
    <h3 class="text-center mt-5">Edit driver</h3>
    <form class="mt-3" method="post" action="{{ route('drivers.update', ['driver' => $driver->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" value="{{ $driver->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">{{ __('validation.attributes.surname') }}</label>
            <input type="text" value="{{ $driver->surname }}" name="surname" class="form-control @error('surname') is-invalid @enderror">
            @error('surname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">{{ __('validation.attributes.age') }}</label>
            <input type="text" value="{{ $driver->age }}" name="age" class="form-control @error('age') is-invalid @enderror">
            @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input type="text" value="{{ $driver->email }}" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">{{ __('validation.attributes.status') }}</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">{{ __('validation.attributes.category') }}</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror">
                <option value="A" @selected($driver->category === "A")>A</option>
                <option value="B" @selected($driver->category === "B")>B</option>
                <option value="C" @selected($driver->category === "C")>C</option>
            </select>
            @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transport" class="form-label">{{ __('validation.attributes.transport') }}</label>
            <select name="transport" class="form-select @error('transport') is-invalid @enderror">
                @foreach($transports as $transport)
                    <option value="{{ $transport->id }}" @selected($driver->transport->name === $transport->name)>{{ $transport->name }}</option>
                @endforeach
            </select>
            @error('transport')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
