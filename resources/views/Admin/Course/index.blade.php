@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4 text-dark fw-bold">Courses Management</h1>
        <a href="{{ route('course.create') }}" class="btn btn-primary mt-3">
            <i class="fas fa-plus me-1"></i> Add New Course
        </a>
    </div>
    
    <ol class="breadcrumb mb-4 small">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Courses</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="coursesTable">
                    <thead class="table-light">
                        <tr>
                            <th>Code</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Department</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td class="fw-bold text-primary">{{ $course->course_code }}</td>
                                <td>{{ $course->name }}</td>
                                <td><span class="badge bg-info text-dark">{{ $course->credits }} Hours</span></td>
                                <td>{{ $course->department->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No courses available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection