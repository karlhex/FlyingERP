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
            'national_id' => '1234',
            'birthday' => $this->faker->date(),
            'origin_city' => 'shenzhen',
            'resident_city' => 'shenzhen',
            'ethnic' => '汉族',
            'join_date' => 20210101,
            'sign_date' => 20210101,
            'level' => 1,
            'sign_type' => 'LT',
            'sign_period' => 36,
            'work_date' => 20210101,

            'sex' => 'M',
            'department' => 'HO',
            'role' => 'manager',
            'phone' => $this->faker->phoneNumber()
        ];
    }

}
