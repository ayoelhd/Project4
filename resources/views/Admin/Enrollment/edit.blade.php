
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Enrollment</h2>

    <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="studentId" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @selected($student->id == $enrollment->studentId)>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Course</label>
            <select name="courseId" class="form-control" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected($course->id == $enrollment->courseId)>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Professor</label>
            <select name="professorId" class="form-control" required>
                @foreach ($professors as $professor)
                    <option value="{{ $professor->id }}" @selected($professor->id == $enrollment->professorId)>
                        {{ $professor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mark</label>
            <input type="number" name="mark" class="form-control" min="0" max="100" value="{{ $enrollment->mark }}">
        </div>

        <x-button type="primary">Update</x-button>
        <x-button href="{{ route('enrollment.index') }}" type="secondary">Cancel</x-button>
    </form>
</div>
@endsection
