<?php

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
         $this->call(SettingsSeeder::class);
//        factory(\App\Models\Setting::class, 1)->create();
//        factory(\App\Models\User::class, 50)->create();
//        factory(\App\Models\Category::class, 5)->create();
//        factory(\App\Models\Product::class, 10)->create();
    }
}
