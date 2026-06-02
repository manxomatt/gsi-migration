<?php

namespace Database\Factories;

use App\Models\GsObject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GsObjectDatum>
 */
class GsObjectDatumFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $imeis = GsObject::select('imei')->limit(10)->get();
        // $imeis = GsObject::select('imei')->limit(10)->get();
        $imeis = GsObject::limit(100)->pluck('imei');

        // dd($imeis);
        return [
            'imei' => fake()->randomElement($imeis), //GsObject::all())['imei'],
            'dt_server' => fake()->dateTime(),
            'dt_tracker' => fake()->dateTime(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'altitude' => fake()->randomNumber(),
            'angle' => fake()->randomNumber(),
            'speed' => fake()->randomNumber(),
            'params' => '{}',
        ];
    }
}
