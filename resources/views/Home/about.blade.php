@extends('layouts.home')

@section('content')
<div class="container py-5 text-center">
    <h2 class="fw-bold mb-5">About Our System</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                <h5>Our Mission</h5>
                <p class="text-muted">To simplify administrative tasks for educational institutions worldwide.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                <h5>Our Vision</h5>
                <p class="text-muted">Empowering universities with data-driven management tools.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                <h5>Community</h5>
                <p class="text-muted">Designed for students and professors to excel together.</p>
            </div>
        </div>
    </div>
</div>
@endsection