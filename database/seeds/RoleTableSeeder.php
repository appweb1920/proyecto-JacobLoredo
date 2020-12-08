<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Rol();
        $role->name = 'admin';
        $role->descripcion = 'Administrator';
        $role->save();
        $role = new Rol();
        $role->name = 'user';
        $role->descripcion = 'User';
        $role->save();
    }
}
