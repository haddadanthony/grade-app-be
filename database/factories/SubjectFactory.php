<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        $subjects = ["Math", "Science", "History", "French", "Physics", "Chemistry"];

        return [
            "name" => $this->faker->randomElement($subjects),
            "passing_grade" => $this->faker->randomElement([60, 70])
        ];
    }
}
