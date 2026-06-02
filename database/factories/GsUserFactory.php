<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GsUser>
 */
class GsUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->username(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'active' => 'true',
            'account_expire' => 'false',
            'privileges' => '{"type":"user","map_osm":true,"map_bing":false,"map_google":false,"map_google_street_view":false,"map_google_traffic":false,"map_mapbox":false,"map_arcgis":false,"map_yandex":false,"kml":true,"dashboard":true,"history":true,"reports":true,"tachograph":true,"tasks":true,"rilogbook":true,"dtc":true,"maintenance":true,"expenses":true,"object_control":true,"image_gallery":true,"chat":true,"subaccounts":true}',
            'api_key' => '',
            'dt_reg' => now(),
            'currency' => 'IDR',
            'timezone' => '+7 hour',
            'dst' => 'false',
            'language' => 'english',
            'units' => 'km,l,c',
            'map_sp' => 'last',
            'map_is' => '1',
            'map_rc' => '#FF0000',
            'map_rhc' => '#0600B8',
        ];
    }
}
