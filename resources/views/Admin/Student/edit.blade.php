@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form method="POST" action="{{ route('student.update', $student->id) }}">
    @csrf
    @method('PUT')

    @include('components.form-input', [
        'name'=>'name',
        'label'=>'Student Name'
    ])

    @include('components.form-input', [
        'name'=>'email',
        'label'=>'Email',
        'type'=>'email'
    ])

    @include('components.button', ['text'=>'Update'])
</form>
@endsection

