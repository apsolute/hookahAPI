<?php

use Illuminate\Database\Seeder;

class HookahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\HookahClub::class, 3)->create()->each(function ($club) {
            $club->hookahs()->save(factory(\App\Models\Hookah::class, 5)->make());
        });
    }
}
