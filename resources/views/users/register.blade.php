@extends('layout')

@section('title', 'Register')

@section('body')
    <form method="post" class="mt-3" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('validation.attributes.password') }}</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('validation.attributes.password_confirmation') }}</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
