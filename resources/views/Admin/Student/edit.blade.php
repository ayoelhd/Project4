@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Edit Student Information</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
        <li class="breadcrumb-item active">Edit Student</li>
    </ol>

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="m-0 font-weight-bold text-info"><i class="fas fa-edit me-2"></i>Update Details for: {{ $student->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Student Number (stNo)</label>
                        <input type="text" name="stNo" class="form-control @error('stNo') is-invalid @enderror" 
                               value="{{ old('stNo', $student->stNo) }}" required>
                        @error('stNo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $student->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">University Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email', $student->email) }}" required>
                        <small class="text-muted">Must be @limu.edu.ly</small>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Average (GPA)</label>
                        <input type="number" step="0.01" name="avg" class="form-control @error('avg') is-invalid @enderror" 
                               value="{{ old('avg', $student->avg) }}">
                        @error('avg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="notActive" {{ old('status', $student->status) == 'notActive' ? 'selected' : '' }}>Not Active</option>
                            <option value="dismissed" {{ old('status', $student->status) == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Department</label>
                        <select name="department_id" class="form-select">
                            <option value="">-- Optional --</option>
                            @foreach(\App\Models\Department::all() as $dept)
                                <option value="{{ $dept->id }}" {{ $student->department_id == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-info text-white px-4 shadow-sm">
                        <i class="fas fa-sync-alt me-1"></i> Update Student Data
                    </button>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary px-4 shadow-sm">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection