@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to University Portal</h1>
    <p class="lead">Manage students and departments easily</p>

    <a href="{{ route('student.index') }}" class="btn btn-primary mt-3">
        Go to Students
    </a>
</div>
@endsection

