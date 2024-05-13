<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Mostrar una lista de empleados
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Mostrar el formulario para crear un nuevo empleado
    public function create()
    {
        return view('employees.create');
    }

    // Almacenar un nuevo empleado en la base de datos
public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees|max:255',
        'position' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max size for photo
    ]);

    // Handle photo upload
if ($request->hasFile('photo')) {
    $photo = $request->file('photo');
    $photoName = time() . '.' . $photo->getClientOriginalExtension();
    $photo->storeAs('public/photos', $photoName);
} else {
    $photoName = null;
}

    // Create employee
    $employee = new Employee([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'email' => $request->get('email'),
        'position' => $request->get('position'),
        'salary' => $request->get('salary'),
        'photo' => $photoName,
    ]);
    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
}


    // Mostrar los detalles de un empleado específico
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    // Mostrar el formulario para editar un empleado
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $employee->id . '|max:255',
        'position' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max size for photo
    ]);

    // Handle photo upload
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs('public/photos', $photoName);
        $employee->photo = $photoName;
    }

    // Actualizar el empleado
    $employee->first_name = $request->get('first_name');
    $employee->last_name = $request->get('last_name');
    $employee->email = $request->get('email');
    $employee->position = $request->get('position');
    $employee->salary = $request->get('salary');
    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
}


    // Eliminar un empleado de la base de datos
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
