@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Departments</h1>
    
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Department List</h5>
            <a href="{{ route('department.create') }}" class="btn btn-success btn-sm">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Symbol</th> {{-- أضفنا هذا العمود --}}
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td><span class="badge bg-secondary">{{ $department->symbol }}</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('department.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Delete this department?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">No data found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection