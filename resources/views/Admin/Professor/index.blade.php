@extends('layouts.app')

@section('content')
<h2>Professors List</h2>

<x-button href="{{ route('professors.create') }}">
    Add Professor
</x-button>

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Department</th>
        <th>Manage</th>
    </tr>

    @foreach ($professors as $professor)
        <tr>
            <td>{{ $professor->name }}</td>
            <td>{{ $professor->department }}</td>
            <td>
                <x-button href="{{ route('professors.edit', $professor->id) }}">
                    Edit / Delete
                </x-button>
            </td>
        </tr>
    @endforeach
</table>
@endsection
