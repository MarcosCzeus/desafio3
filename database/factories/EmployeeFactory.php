<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'position' => $this->faker->jobTitle,
            'salary' => $this->faker->randomFloat(2, 1000, 10000), // Genera un salario aleatorio entre 1000 y 10000
            'photo' => null, // Define como nulo por defecto, puedes agregar lógica para subir imágenes si lo deseas
        ];
    }
}
