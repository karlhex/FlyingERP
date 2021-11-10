<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Certificate;

class CertificateFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sequence' => $this->faker->numberBetween(1,10),
            'cer_name' => $this->faker->text(),
            'cer_date' => $this->faker->date(),
            'cer_source' => $this->faker->company(),
        ];
    }
}
