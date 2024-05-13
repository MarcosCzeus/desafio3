@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Employee Details') }}</div>
        <!-- Enlace para regresar a la vista anterior -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">{{ __('Back') }}</a>
        <div class="card-body">
            <p><strong>{{ __('First Name') }}:</strong> {{ $employee->first_name }}</p>
            <p><strong>{{ __('Last Name') }}:</strong> {{ $employee->last_name }}</p>
            <p><strong>{{ __('Email') }}:</strong> {{ $employee->email }}</p>
            <p><strong>{{ __('Position') }}:</strong> {{ $employee->position }}</p>
            <p><strong>{{ __('Salary') }}:</strong> {{ $employee->salary }}</p>

            @if($employee->photo)
<p><strong>{{ __('Photo') }}:</strong></p>
<img src="{{ asset('storage/photos/' . $employee->photo) }}" alt="{{ $employee->first_name }}" style="max-width: 200px;">
@endif

            <a href="{{ route('employees.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
        </div>
    </div>
</div>
@endsection
