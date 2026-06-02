<?php

use Database\Seeders\GsTemplatesTableSeeder;
use Database\Seeders\GsUsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\GsUser::factory(20000)->create();
        // \App\Models\GsObject::factory(5)->create();
        // \App\Models\GsUserObject::factory(1500)->create();
        // \App\Models\GsObjectDatum::factory(1000)->create();

        $this->call([
            GsTemplatesTableSeeder::class,
            GsUsersTableSeeder::class,
        ]);

    }
}
