@extends('layouts.Admin')

@section('content')
<h2>Professors List</h2>

<x-button href="{{ route('rofessor.create') }}">
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
            <td>{{ $professor->department->name }}</td>
            <td>
                <x-button href="{{ route('professor.edit', $professor->id) }}">
                    Edit / Delete
                </x-button>
            </td>
        </tr>
    @endforeach
</table>
@endsection
