@extends('layouts.app')

@section('content')
<h2>Add Professor</h2>

<form action="{{ route('professors.store') }}" method="POST">
    @csrf

    <x-form-input
        name="name"
        label="Professor Name"
        required
    />

    <x-form-input
        name="department"
        label="Department"
        required
    />

    <x-button type="submit">
        Create
    </x-button>
</form>
@endsection
