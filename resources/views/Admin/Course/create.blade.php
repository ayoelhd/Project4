@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Add New Course</h1>
    
    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus-circle me-2"></i>Course Information</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Symbol</label>
                        <input type="text" name="symbol" class="form-control @error('symbol') is-invalid @enderror" value="{{ old('symbol') }}" placeholder="e.g. CS101">
                        @error('symbol') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Database Systems">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Units (Credit Hours)</label>
                        <input type="number" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit') }}" placeholder="3">
                        @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Department</label>
                        <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                            <option value="">Select Department...</option>
                            @foreach(\App\Models\Department::all() as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Save Course</button>
                    <a href="{{ route('course.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection