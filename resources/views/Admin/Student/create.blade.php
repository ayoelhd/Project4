@extends('layouts.app')

@section('content')
<h2>Add Student</h2>

<form method="POST" action="{{ route('student.store') }}">
    @csrf

    @include('components.form-input', [
        'name'=>'name',
        'label'=>'Student Name'
    ])

    @include('components.form-input', [
        'name'=>'email',
        'label'=>'Email',
        'type'=>'email'
    ])

    @include('components.button', ['text'=>'Save'])
</form>
@endsection

