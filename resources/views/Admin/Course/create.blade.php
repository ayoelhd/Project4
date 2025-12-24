@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Add New Course</h1>
    
    <ol class="breadcrumb mb-4 small">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
        <li class="breadcrumb-item active">Add New Course</li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-book-medical me-2"></i>Course Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('course.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Course Code</label>
                                <input type="text" name="course_code" class="form-control @error('course_code') is-invalid @enderror" placeholder="e.g. CS101" value="{{ old('course_code') }}">
                                @error('course_code')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Course Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Database Systems" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Credit Hours</label>
                                <input type="number" name="credits" class="form-control @error('credits') is-invalid @enderror" placeholder="3" value="{{ old('credits') }}">
                                @error('credits')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Department</label>
                                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                                    <option value="">Select Department...</option>
                                    @isset($departments)
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                                {{ $dept->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 border-top pt-3">
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <i class="fas fa-save me-1"></i> Save Course
                            </button>
                            <a href="{{ route('course.index') }}" class="btn btn-light border px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0 bg-light">
                <div class="card-body small">
                    <h6 class="fw-bold text-dark"><i class="fas fa-lightbulb me-2 text-warning"></i>Quick Tips</h6>
                    <hr>
                    <p class="mb-1 text-muted">1. <strong>Course Code</strong> is unique; you cannot have two courses with the same code.</p>
                    <p class="mb-1 text-muted">2. Assign the course to the correct <strong>Department</strong> to help students find it.</p>
                    <p class="mb-0 text-muted">3. <strong>Credit Hours</strong> are usually between 1 and 6.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection