@extends('layouts.app')

@section('content')
<h2>Edit Professor</h2>

<form action="{{ route('professor.update', $professor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Name -->
    <x-form-input
        name="name"
        label="Professor Name"
        value="{{ $professor->name }}"
        required
    />

    <!-- Email -->
    <x-form-input
        name="email"
        label="Email"
        type="email"
        value="{{ $professor->email }}"
        required
    />

    <!-- Password (optional) -->
    <x-form-input
        name="password"
        label="New Password (leave empty to keep current)"
        type="password"
    />

    <!-- Department -->
    <label>Department</label>
    <select name="depId" required>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}"
                {{ $professor->depId == $department->id ? 'selected' : '' }}>
                {{ $department->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <x-button type="submit">
        Update
    </x-button>
</form>

<hr>

<form action="{{ route('professor.destroy', $professor->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-button type="submit">
        Delete Professor
    </x-button>
</form>
@endsection
