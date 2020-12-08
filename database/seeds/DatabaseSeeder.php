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
        $this->call(RoleTableSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
