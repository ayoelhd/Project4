@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Department</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                </div>
            @endif

            <form action="{{ route('department.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Department Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Department Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="e.g. CS, ENG, MED">
                </div>

                <button type="submit" class="btn btn-primary">Save Department</button>
                <a href="{{ route('department.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection


