@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Student</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                </div>
            @endif

            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Student Number (stNo)</label>
                        <input type="text" name="stNo" class="form-control" value="{{ old('stNo') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Email (must end with @limu.edu.ly)</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Average (Optional)</label>
                        <input type="number" step="0.01" name="avg" class="form-control" value="{{ old('avg') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="notActive">Not Active</option>
                            <option value="dismissed">Dismissed</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Student</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

