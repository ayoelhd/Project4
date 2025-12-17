@extends('layouts.app')

@section('content')
<h2>Edit Department</h2>

<form method="POST" action="{{ route('department.update', $department->id) }}">
    @csrf
    @method('PUT')

    @include('components.form-input', [
        'name'=>'name',
        'label'=>'Department Name'
    ])

    @include('components.button', ['text'=>'Update'])
</form>
@endsection

