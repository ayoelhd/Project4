@extends('layouts.Admin')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 font-weight-bold text-primary">Add New Professor</h5>
            <p class="text-muted small mb-0">Fill in the details below to create a new faculty account.</p>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('professor.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-form-input name="name" label="Professor Name" placeholder="e.g. Dr. John Doe" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-form-input name="email" label="Email Address" type="email" placeholder="name@university.edu" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-form-input name="password" label="Initial Password" type="password" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Department</label>
                        <select name="depId" class="form-select @error('depId') is-invalid @enderror" required>
                            <option value="" selected disabled>Choose a department...</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ old('depId') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('depId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('professor.index') }}" class="btn btn-light border">Cancel</a>
                    <x-button type="submit" class="btn-primary px-4">
                        <i class="fas fa-plus me-1"></i> Create Professor
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
