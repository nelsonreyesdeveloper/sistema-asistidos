<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->verificarnombrenorepetido(),
        ];
    }

    public function verificarnombrenorepetido()
    {

        $fakename = fake()->name();
        $nombre = User::where('name',  $fakename)->first();

        if ($nombre) {
            // Si el nombre está repetido, llamamos recursivamente y devolvemos el resultado
            return $this->verificarnombrenorepetido();
        } else {
            // Si el nombre no está repetido, lo devolvemos
            return $fakename;
        }
    }
}
