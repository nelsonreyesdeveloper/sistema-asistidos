<?php

namespace Database\Factories;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expediente>
 */
class ExpedienteFactory extends Factory
{
    protected $contadorExpediente = 1;
    // Lista de delitos posibles
    protected $años = [
        "1 AÑO",
        "2 AÑOS",
        "3 AÑOS",
        "4 AÑOS",
        "5 AÑOS",
    ];

    protected $penasaccesorias = [
        "Servicio social limpieza",
        "Servicio social vigilancia",
        "Servicio social educacion",
        "Servicio social contruccion",
    ];
    protected $delitos = [
        'Robo',
        'Asalto',
        'Fraude',
        'Homicidio',
        'Secuestro',
        'Violación',
        'Atraco',
        // Agrega más delitos según sea necesario
    ];
    protected $anoActual = 14;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $anoActual = date('y');

        // Guardar el número de expediente actual
        $numeroExpediente = $this->contadorExpediente;

        // Generar un número de parte solo si es el segundo expediente o superior del mismo número
        $parte = $numeroExpediente > 1 ? $this->faker->numberBetween(1, 5) : null;

        // Generar un número de colaborador aleatorio
        $colaborador = $this->faker->numberBetween(1, 5);

        // Seleccionar un delito aleatorio de la lista
        $delito = $this->delitos[array_rand($this->delitos)];

        // Incrementar el contador solo si es un nuevo número de expediente
        if ($parte === null) {
            $this->contadorExpediente++;
        }

        // Construir el número de expediente
        $numeroExpedienteString = $numeroExpediente . '/' . $anoActual;

        // Agregar la parte si existe
        $numeroExpedienteString .= $parte ? '-' . $parte : '';

        // Agregar el número de colaborador
        $numeroExpedienteString .= '-' . $colaborador;


        return [
            'tipo_id' => Tipo::all()->random()->id,
            'n_expediente' => $numeroExpedienteString,
            'user_id' => User::all()->random()->id,
            'delito' => $this->faker->randomElement($this->delitos),
            'fecha_sentencia' => fake()->date(),
            'pena' => $this->faker->randomElement($this->años),
            'observaciones' => fake()->paragraphs(1,true),
            'penas_accesorias' => $this->faker->randomElement($this->penasaccesorias),
            'fecha_ingreso' => fake()->date(),
        ];
    }
}
