<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'idnumber' => $this->faker->unique(),
            // 'photo' => $this->faker->,
            // 'name' => $this->faker->name(),
            // 'callname' => $this->faker->,
            // 'phone' => $this->faker->,
            // 'position' => $this->faker->,
            // 'validity' => $this->faker->,
        ];
    }
}
