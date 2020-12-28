<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birth_year' => $this->faker->date("Y-m-d", "20/12/12"),
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(["male", "female"])
        ];
    }
}
