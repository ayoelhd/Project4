@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark fw-bold">University Admin Dashboard</h1>
    <p class="text-muted small">Academic Management System | Central Control</p>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow py-2 h-100">
                <div class="card-body">
                    <div class="small text-white-50 text-uppercase fw-bold">Total Students</div>
                    <div class="h3 fw-bold">{{ \App\Models\Student::count() }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small border-0 bg-transparent">
                    <a class="text-white stretched-link text-decoration-none" href="{{ route('student.index') }}">View List</a>
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow py-2 h-100">
                <div class="card-body">
                    <div class="small text-white-50 text-uppercase fw-bold">Professors</div>
                    <div class="h3 fw-bold">{{ class_exists('App\Models\Professor') ? \App\Models\Professor::count() : 0 }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small border-0 bg-transparent">
                    <a class="text-white stretched-link text-decoration-none" href="{{ route('professor.index') }}">View Staff</a>
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow py-2 h-100">
                <div class="card-body">
                    <div class="small text-dark-50 text-uppercase fw-bold text-dark">Total Courses</div>
                    <div class="h3 fw-bold text-dark">{{ class_exists('App\Models\Course') ? \App\Models\Course::count() : 0 }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small border-0 bg-transparent">
                    <a class="text-dark stretched-link text-decoration-none" href="{{ route('course.index') }}">View Courses</a>
                    <i class="fas fa-book text-dark"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow py-2 h-100">
                <div class="card-body">
                    <div class="small text-white-50 text-uppercase fw-bold">Enrollments</div>
                    <div class="h3 fw-bold">{{ class_exists('App\Models\Enrollment') ? \App\Models\Enrollment::count() : 0 }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small border-0 bg-transparent">
                    <a class="text-white stretched-link text-decoration-none" href="{{ route('enrollment.index') }}">View Details</a>
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
        </div>
    </div> 

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history me-2"></i>Recently Joined Students
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>stNo</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Student::latest()->take(5)->get() as $recentStudent)
                            <tr>
                                <td>#{{ $recentStudent->stNo }}</td>
                                <td class="fw-bold">{{ $recentStudent->name }}</td>
                                <td>{{ $recentStudent->email }}</td>
                                <td class="text-center">
                                    @if($recentStudent->status == 'active')
                                        <span class="badge bg-success rounded-pill px-3">Active</span>
                                    @elseif($recentStudent->status == 'notActive')
                                        <span class="badge bg-secondary rounded-pill px-3">Not Active</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill px-3">{{ ucfirst($recentStudent->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-4 text-muted">No students found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection