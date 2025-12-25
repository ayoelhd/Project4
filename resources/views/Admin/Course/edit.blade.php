@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">Edit Course</h1>
    
    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-edit me-2"></i>Update: {{ $course->name }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- هذا السطر ضروري جداً لعملية التعديل --}}
                
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Symbol</label>
                        <input type="text" name="symbol" class="form-control @error('symbol') is-invalid @enderror" value="{{ old('symbol', $course->symbol) }}">
                        @error('symbol') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $course->name) }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Units</label>
                        <input type="number" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $course->unit) }}">
                        @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Department</label>
                        <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                            @foreach(\App\Models\Department::all() as $dept)
                                <option value="{{ $dept->id }}" {{ (old('department_id', $course->department_id) == $dept->id) ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success px-5 shadow-sm">Update Course</button>
                    <a href="{{ route('course.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection