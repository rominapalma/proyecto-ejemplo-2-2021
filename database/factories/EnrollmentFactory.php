<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level' => $this->faker->unique()->randomDigit,
            'date'=> $this->faker->date,
            'id_student' => Subject::all()->random()->id
        ];
    }
}
