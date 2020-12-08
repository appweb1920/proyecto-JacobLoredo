<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user = new user();
        $user->name='Jacob';
        $user->email = 'yeicob_loredo@hotmail.com';
        $user->password=Hash::make('12345678');
        
        $user->save();
        $user->roles()->attach([1]);

        $user = new user();
        $user->name='Usuario';
        $user->email = 'adad@hrtta.com';
        $user->password=Hash::make('12345678');
        $user->save();
        $user->roles()->attach([2]);
    }
}
