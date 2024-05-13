@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Enlace para regresar a la vista anterior -->
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">{{ __('Back') }}</a>

                    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" required autofocus>
                        </div>

                        <!-- Agrega los campos restantes -->
                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="position">{{ __('Position') }}</label>
                            <input id="position" type="text" class="form-control" name="position" value="{{ $employee->position }}" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">{{ __('Salary') }}</label>
                            <input id="salary" type="number" class="form-control" name="salary" value="{{ $employee->salary }}" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ __('Photo') }}</label>
                            <input id="photo" type="file" class="form-control" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
