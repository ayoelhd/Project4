@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Edit Course</h1>
    
    <ol class="breadcrumb mb-4 small">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
        <li class="breadcrumb-item active">Edit Course</li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit me-2"></i>Update Course: {{ $course->name }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('course.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Course Code</label>
                                <input type="text" name="course_code" class="form-control @error('course_code') is-invalid @enderror" 
                                       value="{{ old('course_code', $course->course_code) }}">
                                @error('course_code')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Course Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $course->name) }}">
                                @error('name')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Credit Hours</label>
                                <input type="number" name="credits" class="form-control @error('credits') is-invalid @enderror" 
                                       value="{{ old('credits', $course->credits) }}">
                                @error('credits')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Department</label>
                                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->id }}" 
                                            {{ (old('department_id', $course->department_id) == $dept->id) ? 'selected' : '' }}>
                                            {{ $dept->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback text-danger small fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 border-top pt-3">
                            <button type="submit" class="btn btn-success px-5 shadow-sm">
                                <i class="fas fa-check-circle me-1"></i> Update Changes
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
                    <h6 class="fw-bold"><i class="fas fa-history me-2 text-primary"></i> Last Update</h6>
                    <hr>
                    <p class="text-muted">Created at: {{ $course->created_at->format('Y-m-d H:i') }}</p>
                    <p class="text-muted mb-0">Last modified: {{ $course->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection