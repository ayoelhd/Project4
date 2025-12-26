@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Enrollments</h2>

    <x-button href="{{ route('enrollment.create') }}" type="primary" class="mb-3">
        Enroll Student
    </x-button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Professor</th>
                <th>Mark</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollments as $enrollment)
                <tr>
                    <!-- Student column -->
                    <td>{{ $enrollment->student?->name ?? 'N/A' }}</td>

                    <!-- Course column -->
                    <td>{{ $enrollment->course?->name ?? 'N/A' }}</td>

                    <!-- Professor column -->
                    <td>{{ $enrollment->professor?->name ?? 'N/A' }}</td>

                    <!-- Mark column -->
                    <td>{{ $enrollment->mark ?? 'N/A' }}</td>

                    <!-- Actions column -->
                    <td class="d-flex gap-2 justify-content-center">
    <x-button href="{{ route('enrollment.edit', $enrollment->id) }}" type="warning">
        Edit
    </x-button>

    <form action="{{ route('enrollment.destroy', $enrollment->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-button type="danger" onclick="return confirm('Drop this student from the course?')">
            Delete
        </x-button>
    </form>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
