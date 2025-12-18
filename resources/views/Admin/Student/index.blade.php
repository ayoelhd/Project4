@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Students List</h2>
        <a href="{{ route('student.create') }}" class="btn btn-success">Add New Student</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Student No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Average</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->stNo }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->avg ?? 'N/A' }}</td>
                <td>
                    @if($student->status == 'active')
                        <span class="badge badge-success">Active</span>
                    @elseif($student->status == 'notActive')
                        <span class="badge badge-warning">Not Active</span>
                    @else
                        <span class="badge badge-danger">Dismissed</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-info">Edit</a>
                    
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



