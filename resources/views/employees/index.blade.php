@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Employee Management') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        @if (Auth::user()->isAdmin())
                            <a href="{{ route('employees.create') }}" class="btn btn-success">{{ __('Add Employee') }}</a>
                        @endif
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Position') }}</th>
                                <th>{{ __('Salary') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">{{ __('View') }}</a>
                                        @if (Auth::user()->isAdmin())
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">{{ __('Delete') }}</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
