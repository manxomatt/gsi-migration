<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GsObject>
 */
class GsObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imei = fake()->unique()->numerify('1##############');
        return [
            'imei' => $imei,
            'name' => $imei,
            'protocol' => '',
            'net_protocol' => '',
            'ip' => '',
            'port' => '',
            'active' => 'true',
            'object_expire' => 'false',
            'manager_id' => 0,
            'icon' => 'img/markers/objects/blue_car_1.png',
            'map_icon' => 'arrow',
            'tail_color' => '#00FF44',
            'tail_points' => 7,
            'device' => '',
            'sim_number' => '',
            'model' => '',
            'vin' => '',
            'plate_number' => '',
            'engine_hours_type' => 'off',
        ];
    }
}
