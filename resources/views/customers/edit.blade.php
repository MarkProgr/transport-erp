@extends('layout')

@section('title', 'Edit customer')

@section('body')
    <h3 class="text-center mt-5">Editing customer {{ $customer->name }}</h3>
    <form class="mt-3" method="post" action="{{ route('customers.update', ['customer' => $customer->id]) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" disabled value="{{ $customer->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">{{ __('validation.attributes.country') }}</label>
            <input type="text" disabled value="{{ $customer->country }}" name="country" class="form-control @error('country') is-invalid @enderror">
            @error('country')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">{{ __('validation.attributes.date_of_deal') }}</label>
            <input type="text" disabled value="{{ $customer->date_of_deal }}" name="date_of_deal" class="form-control @error('date_of_deal') is-invalid @enderror">
            @error('date_of_deal')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">{{ __('validation.attributes.deadline') }}</label>
            <input type="text" value="{{ $customer->deadline }}" name="deadline" class="form-control @error('deadline') is-invalid @enderror">
            @error('deadline')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_of_deal" class="form-label">{{ __('validation.attributes.status_of_deal') }}</label>
            <select name="status_of_deal" class="form-select @error('status_of_deal') is-invalid @enderror">
                <option value="In process" @selected($customer->status_of_deal === "In process")>In process</option>
                <option value="Done" @selected($customer->status_of_deal === "Done")>Done</option>
            </select>
            @error('status_of_deal')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="favors">Services: </label>
            @foreach($favors as $favor)
                        <div class="form-check">
                            <input class="form-check-input" name="favors[]" type="checkbox" value="{{ $favor->id }}"
                            @if($customer->favors->contains('id', $favor->id)) checked @endif>
                            {{ $favor->name }}
                        </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
