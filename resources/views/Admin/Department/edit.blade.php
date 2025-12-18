@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Department: {{ $department->name }}</div>
        <div class="card-body">
            <form action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Department Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Department Code</label>
                    <input type="text" name="code" class="form-control" value="{{ $department->code }}">
                </div>

                <button type="submit" class="btn btn-info">Update Department</button>
                <a href="{{ route('department.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection