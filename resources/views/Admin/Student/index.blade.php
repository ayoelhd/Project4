@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Students Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item active">Students</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-user-graduate me-2"></i>Registered Students
            </h5>
            <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                <i class="fas fa-plus me-1"></i> Add New Student
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Department</th>
                            <th>Joined Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="fw-bold text-muted">#{{ $student->id }}</td>
                                <td class="fw-bold">{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $student->department->name ?? 'Unassigned' }}
                                    </span>
                                </td>
                                <td>{{ $student->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('student.edit', $student->id) }}" 
                                           class="btn btn-sm btn-info text-white shadow-sm" 
                                           title="Edit Student">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('student.destroy', $student->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this student?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm" title="Delete Student">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-users-slash fa-3x mb-3 opacity-25"></i>
                                        <p class="mb-0 fw-bold">No students registered in the system.</p>
                                        <small>Click "Add New Student" to get started.</small>
                                    </div>
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

