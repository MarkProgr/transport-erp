@extends('layout')

@section('title', 'Choose type')

@section('body')
    <form class="mt-4" method="post" action="{{ route('choose.type') }}">
        @csrf
        <select class="form-select" name="type">
            @foreach($types as $type)
            <option value="{{ $type->type }}">{{ $type->type }}</option>
            @endforeach
        </select>
        <button class="btn btn-info">Choose type of transport</button>
    </form>
@endsection
