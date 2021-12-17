<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;
use App\Models\Student;

class GroupStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_leader' => $this->faker->boolean,
            'id_group' => Group::all()->random()->id,
            'id_student' => Student::all()->random()->id
        ];
    }
}
