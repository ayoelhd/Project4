@extends('layouts.app')

@section('content')
<h2>Add Department</h2>

<form method="POST" action="{{ route('department.store') }}">
    @csrf

    @include('components.form-input', [
        'name'=>'name',
        'label'=>'Department Name'
    ])

    @include('components.button', ['text'=>'Save'])
</form>
@endsection


