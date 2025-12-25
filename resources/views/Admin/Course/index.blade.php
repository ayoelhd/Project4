@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4 text-dark fw-bold">Courses Management</h1>
        <a href="{{ route('course.create') }}" class="btn btn-primary shadow-sm mt-3">
            <i class="fas fa-plus-circle me-1"></i> Add New Course
        </a>
    </div>

    <ol class="breadcrumb mb-4 small">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Courses List</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table me-2"></i>All Courses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Symbol</th>
                            <th>Units</th>
                            <th>Department</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold text-dark">{{ $course->name }}</td>
                                <td><span class="badge bg-secondary">{{ $course->symbol }}</span></td>
                                <td>{{ $course->unit }}</td>
                                <td>
                                    <span class="text-muted small">
                                        <i class="fas fa-building me-1"></i>
                                        {{ $course->department->name ?? 'No Department' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-success mx-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No courses found. <a href="{{ route('course.create') }}">Add your first course now!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection