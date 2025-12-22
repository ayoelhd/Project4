@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Register New Student</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
        <li class="breadcrumb-item active">New Registration</li>
    </ol>

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus me-2"></i>Student Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Student Number (stNo)</label>
                        <input type="text" name="stNo" class="form-control @error('stNo') is-invalid @enderror" value="{{ old('stNo') }}" placeholder="e.g. 22001" required>
                        @error('stNo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">University Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@limu.edu.ly" value="{{ old('email') }}" required>
                        <small class="text-muted">Must end with @limu.edu.ly</small>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Average (GPA)</label>
                        <input type="number" step="0.01" name="avg" class="form-control @error('avg') is-invalid @enderror" value="{{ old('avg') }}">
                        @error('avg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="notActive" {{ old('status') == 'notActive' ? 'selected' : '' }}>Not Active</option>
                            <option value="dismissed" {{ old('status') == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Department</label>
                        <select name="department_id" class="form-select">
                            <option value="">-- Optional --</option>
                            @foreach(\App\Models\Department::all() as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Save Student Data</button>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary px-4 shadow-sm">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection