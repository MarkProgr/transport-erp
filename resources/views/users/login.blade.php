@extends('layout')

@section('title', 'Login')

@section('body')
    <h3 class="mt-3 text-center">Login page</h3>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif
    <form method="post" class="mt-3" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('validation.attributes.password') }}</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
