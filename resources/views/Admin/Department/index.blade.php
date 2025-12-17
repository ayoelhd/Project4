@extends('layouts.app')

@section('content')
<h2>Departments</h2>

<a href="{{ route('department.create') }}" class="btn btn-success mb-3">Add Department</a>

<table class="table table-bordered">
@foreach($departments as $department)
<tr>
    <td>{{ $department->name }}</td>
    <td>
        <a href="{{ route('department.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('department.destroy', $department->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection


