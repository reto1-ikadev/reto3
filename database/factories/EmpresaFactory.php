<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->company,
            'cif' => $this->faker->unique()->randomNumber(8).$this->faker->randomLetter,
            'email_contacto' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'sector' => $this->faker->randomElement(['Informatica', 'Mecanica', 'Industrial', 'Quimica']),
        ];
    }
}
