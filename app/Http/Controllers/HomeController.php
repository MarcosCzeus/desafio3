<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if ($user) {
            // Buscar al empleado por el correo electrónico del usuario
            $employee = Employee::where('email', $user->email)->first();

            // Devolver la vista home con los datos del empleado
            return view('home', compact('employee'));
        }

        // Si el usuario no está autenticado, simplemente devuelve la vista home sin datos
        return view('home');
    }
}