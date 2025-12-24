@extends('layouts.Admin')

@section('content')
<h2>Add Professor</h2>

<form action="{{ route('professor.store') }}" method="POST">
    @csrf

    <!-- Professor Name -->
    <x-form-input
        name="name"
        label="Professor Name"
        required
    />

    <!-- Email -->
    <x-form-input
        name="email"
        label="Email"
        type="email"
        required
    />

    <!-- Password -->
    <x-form-input
        name="password"
        label="Password"
        type="password"
        required
    />

    <!-- Department -->
    <label>Department</label>
    <select name="depId" required>
        <option value="">Select Department</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <x-button type="submit">
        Create
    </x-button>
</form>
@endsection
