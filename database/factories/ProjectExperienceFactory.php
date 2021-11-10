<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProjectExperience;

class ProjectExperienceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectExperience::class;

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
            'project' => $this->faker->text(),
            'role' => $this->faker->randomElement(['项目经理', '开发经理', '开发工程师', '架构师']),
        ];
    }

}
