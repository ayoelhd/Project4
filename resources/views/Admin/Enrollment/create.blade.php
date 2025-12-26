@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h2 class="mb-4 text-dark fw-bold">Enroll Student in Course</h2>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus me-2"></i>Enrollment Form</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('enrollment.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <!-- Student dropdown -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Select Student</label>
                        <select name="studentId" class="form-select" required>
                            <option value="">-- Select Student --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Course dropdown -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Select Course</label>
                        <select name="courseId" class="form-select" required>
                            <option value="">-- Select Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Professor dropdown -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Select Professor</label>
                        <select name="professorId" class="form-select" required>
                            <option value="">-- Select Professor --</option>
                            @foreach ($professors as $professor)
                                <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mark input -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Mark</label>
                        <input type="number" name="mark" class="form-control" min="0" max="100" step="0.01" required placeholder="Enter mark (0-100)">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success px-4 shadow-sm">
                        <i class="fas fa-check me-1"></i> Enroll
                    </button>
                    <a href="{{ route('enrollment.index') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
