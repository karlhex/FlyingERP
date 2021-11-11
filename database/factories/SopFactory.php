<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sop;

class SopFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sequence' => $this->faker->numberBetween(1,10),
            'instruction' => $this->faker->text(30),
            'drcr' => $this->faker->randomElement(['Dr', 'Cr']),
            'schedule_date' => $this->faker->date(),
            'tran_date' => $this->faker->date(),
            'amount' => $this->faker->randomFloat(2),
            'memo' => $this->faker->text(30),
        ];
    }

}
