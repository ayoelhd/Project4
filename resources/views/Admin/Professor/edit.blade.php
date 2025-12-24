@extends('layouts.Admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 text-gray-800">Edit Professor</h2>
            <p class="text-muted">Updating profile for: <strong>{{ $professor->name }}</strong></p>
        </div>
        <a href="{{ route('professor.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <form action="{{ route('professor.update', $professor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <x-form-input name="name" label="Professor Name" value="{{ old('name', $professor->name) }}" required />
                            </div>

                            <div class="col-md-6">
                                <x-form-input name="email" label="Email Address" type="email" value="{{ old('email', $professor->email) }}" required />
                            </div>

                            <div class="col-md-12 mt-3">
                                <label class="form-label font-weight-bold">Department</label>
                                <select name="depId" class="form-select border-gray-300" required>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ (old('depId', $professor->depId) == $department->id) ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="p-3 bg-light rounded border">
                                    <x-form-input name="password" label="New Password" type="password" />
                                    <small class="text-muted"><i class="fas fa-info-circle"></i> Leave blank if you don't want to change the password.</small>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <x-button type="submit" class="btn-primary px-5">
                                Save Changes
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0 h6">Danger Zone</h5>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Once you delete a professor, the action cannot be undone. Please be certain.</p>
                    
                    <form action="{{ route('professor.destroy', $professor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this professor?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-block w-100">
                            <i class="fas fa-trash-alt"></i> Delete Professor
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
