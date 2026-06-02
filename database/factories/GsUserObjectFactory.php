<?php

namespace Database\Factories;

use App\Models\GsObject;
use App\Models\GsUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GsUserObject>
 */
class GsUserObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imeis = GsObject::limit(5000)->pluck('imei');

        return [
            'user_id' => 1, //GsUser::factory(),
            'imei' => fake()->randomElement($imeis), //GsObject::factory(),
            'driver_id' => 0,
            'group_id' => 0,
            'trailer_id' => 0,
        ];
    }
}
