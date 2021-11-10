<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

class EmployeeFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'employee_sid' => $this->faker->numberBetween(0, 999999),
            'national_id' => '12345678901234567890',
            'birthday' => $this->faker->date(),
            'origin_city' => $this->faker->city(),
            'resident_city' => $this->faker->city(),
            'ethnic' => $this->faker->randomElement(['汉族','藏族', '维吾尔族','苗族','壮族','蒙古族']),
            'join_date' => $this->faker->date(),
            'sign_date' => $this->faker->date(),
            'level' => $this->faker->numberBetween(1,20),
            'sign_type' => $this->faker->randomElement(['LT', 'ST']),
            'sign_period' => 36,
            'work_date' => $this->faker->date(),

            'sex' => $this->faker->randomElement(['M', 'F']),
            'department' => $this->faker->randomElement(['HO','HRD','GAD','SD','RND','PD','ED','AD','ASSD']),
            'role' => $this->faker->randomElement(['GM','VP','DM','PM','AM','O']),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }

}
