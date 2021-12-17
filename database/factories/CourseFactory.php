<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image'=> $this->faker->imageUrl($width = 640, $height = 480),
            'description'=> $this->faker->text($maxNbChars = 200),
            'id_subject' => Subject::all()->random()->id
        ];
    }
}
