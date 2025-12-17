@extends('layouts.app')

@section('content')
<h2>Students</h2>

<a href="{{ route('student.create') }}" class="btn btn-success mb-3">Add Student</a>

<table class="table table-striped">
@foreach($students as $student)
<tr>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>
        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection



