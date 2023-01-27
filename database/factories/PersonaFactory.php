<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'dni' => $this->faker->unique()->randomNumber(8).$this->faker->randomLetter,
            'telefono' => $this->faker->phoneNumber,
            //tipo es  alumno
            'tipo' => 'alumnos',
        ];
    }
    public function coordinador()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo' => 'coordinador',
            ];
        });
    }
    public function tutor_academico()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo' => 'tutor_academico',
            ];
        });
    }
    public function tutor_empresa()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo' => 'tutor_empresa',
            ];
        });
    }
}
