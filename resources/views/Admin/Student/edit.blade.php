@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Student: {{ $student->name }}</div>
        <div class="card-body">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Student Number</label>
                        <input type="text" name="stNo" class="form-control" value="{{ $student->stNo }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Average</label>
                        <input type="number" step="0.01" name="avg" class="form-control" value="{{ $student->avg }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="notActive" {{ $student->status == 'notActive' ? 'selected' : '' }}>Not Active</option>
                            <option value="dismissed" {{ $student->status == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Update Student</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
