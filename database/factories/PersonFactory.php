<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone1' => $this->faker->phoneNumber(),
            'phone2' => $this->faker->phoneNumber(),
            'phone3' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'company_name' => $this->faker->company(),
            'department' => $this->faker->randomElement(['行政部', '技术部', '运维部', '工程部']),
            'position' => $this->faker->randomElement(['开发工程师', '总经理', '经理', '副总经理', '文员', '会计']),
        ];
    }

}
