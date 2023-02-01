@extends('layout')

@section('title', 'Create favor')

@section('body')
    <form id="creating_form" method="post" action="{{ route('favors.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('validation.attributes.description') }}</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">
                {{ old('description') }}
            </textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">{{ __('validation.attributes.cost') }}</label>
            <input type="text" value="{{ old('cost') }}" name="cost" class="form-control @error('cost') is-invalid @enderror">
            @error('cost')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sending_point" class="form-label">{{ __('validation.attributes.sending_point') }}</label>
            <input type="text" value="{{ old('sending_point') }}" name="sending_point" class="form-control @error('sending_point') is-invalid @enderror">
            @error('sending_point')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="destination_point" class="form-label">{{ __('validation.attributes.destination_point') }}</label>
            <input type="text" value="{{ old('destination_point') }}" name="destination_point" class="form-control @error('destination_point') is-invalid @enderror">
            @error('destination_point')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transport" class="form-label">{{ __('validation.attributes.transport') }}</label>
            <select name="transport" class="form-select @error('transport') is-invalid @enderror">
                @foreach($transports as $transport)
                <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                @endforeach
            </select>
            @error('transport')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create service</button>
    </form>
@endsection
