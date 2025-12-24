@extends('layouts.Admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 text-gray-800">Professors Directory</h2>
            <p class="text-muted small mb-0">Manage faculty members and their department assignments.</p>
        </div>
        <x-button href="{{ route('professor.create') }}" class="btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Professor
        </x-button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4">Professor Name</th>
                        <th>Department</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($professors as $professor)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-soft-primary text-primary rounded-circle p-2 text-center" style="width: 40px; background: #eef2ff;">
                                        {{ substr($professor->name, 0, 1) }}
                                    </div>
                                    <span class="fw-bold text-dark">{{ $professor->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $professor->department->name ?? 'Unassigned' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <x-button href="{{ route('professor.edit', $professor->id) }}" class="btn-sm btn-outline-secondary">
                                    <i class="fas fa-edit me-1"></i> Manage
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                No professors found in the database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
