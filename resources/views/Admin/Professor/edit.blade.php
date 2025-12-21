@extends('layouts.app')

@section('content')
<h2>Edit Professor</h2>

<form action="{{ route('professors.update', $professor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-form-input
        name="name"
        label="Professor Name"
        value="{{ $professor->name }}"
        required
    />

    <x-form-input
        name="department"
        label="Department"
        value="{{ $professor->department }}"
        required
    />

    <x-button type="submit">
        Update
    </x-button>
</form>

<hr>

<form action="{{ route('professors.destroy', $professor->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-button type="submit">
        Delete Professor
    </x-button>
</form>
@endsection
