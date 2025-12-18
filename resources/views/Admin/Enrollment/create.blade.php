
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Enroll Student in Course</h2>

    <form action="{{ route('enrollment.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="studentId" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Course</label>
            <select name="courseId" class="form-control" required>
                <option value="">-- Select Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Professor</label>
            <select name="professorId" class="form-control" required>
                <option value="">-- Select Professor --</option>
                @foreach ($professors as $professor)
                    <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                @endforeach
            </select>
        </div>

       

        <x-button type="success">Enroll</x-button>
        <x-button href="{{ route('enrollment.index') }}" type="secondary">Cancel</x-button>
    </form>
</div>
@endsection