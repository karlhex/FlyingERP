<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WorkExperience;

class WorkExperienceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sequence' => $this->faker->numberBetween(1,10),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'company' => $this->faker->company(),
            'department' => $this->faker->randomElement(['行政部', '技术部', '运维部', '工程部']),
            'position' => $this->faker->randomElement(['开发工程师', '总经理', '经理', '副总经理', '文员', '会计']),
        ];
    }

}
