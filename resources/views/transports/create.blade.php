@extends('layout')

@section('title', 'Create transport')

@section('body')
    <h3 class="text-center mt-5">Creating new transport</h3>
    <form class="mt-3" method="post" action="{{ route('transports.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">{{ __('validation.attributes.type') }}</label>
            <input type="text" value="{{ old('type') }}" name="type" class="form-control @error('type') is-invalid @enderror">
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">{{ __('validation.attributes.status') }}</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="Active">Active</option>
                <option value="At parking">At parking</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technical_status" class="form-label">{{ __('validation.attributes.technical_status') }}</label>
            <select name="technical_status" class="form-select @error('technical_status') is-invalid @enderror">
                <option value="Fine">Fine</option>
                <option value="Repair">Need repairs</option>
            </select>
            @error('technical_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
