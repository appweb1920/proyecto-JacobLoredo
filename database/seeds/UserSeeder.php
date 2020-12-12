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
        $user->user_token= $user->user_token = implode('-', [
            "Abarrotes",
            uniqid(''),
            bin2hex(random_bytes(4)),
            bin2hex(random_bytes(2)),
            bin2hex(chr((ord(random_bytes(1)) & 0x0F) | 0x40)) . bin2hex(random_bytes(1)),
            bin2hex(chr((ord(random_bytes(1)) & 0x3F) | 0x80)) . bin2hex(random_bytes(1)),
            bin2hex(random_bytes(6))
        ]);;
        $user->save();
        $user->roles()->attach([1]);

        $user = new user();
        $user->name='Revision';
        $user->email = 'profesor@hotmail.com';
        $user->password=Hash::make('12345678');
        $user->user_token= $user->user_token = implode('-', [
            "Abarrotes",
            uniqid(''),
            bin2hex(random_bytes(4)),
            bin2hex(random_bytes(2)),
            bin2hex(chr((ord(random_bytes(1)) & 0x0F) | 0x40)) . bin2hex(random_bytes(1)),
            bin2hex(chr((ord(random_bytes(1)) & 0x3F) | 0x80)) . bin2hex(random_bytes(1)),
            bin2hex(random_bytes(6))
        ]);;
        $user->save();
        $user->roles()->attach([1]);

        $user = new user();
        $user->name='Usuario';
        $user->email = 'adad@hrtta.com';
        $user->password=Hash::make('12345678');
        $user->user_token= $user->user_token = implode('-', [
            "Abarrotes",
            uniqid(''),
            bin2hex(random_bytes(4)),
            bin2hex(random_bytes(2)),
            bin2hex(chr((ord(random_bytes(1)) & 0x0F) | 0x40)) . bin2hex(random_bytes(1)),
            bin2hex(chr((ord(random_bytes(1)) & 0x3F) | 0x80)) . bin2hex(random_bytes(1)),
            bin2hex(random_bytes(6))
        ]);;
        $user->save();
        $user->roles()->attach([2]);
    }
}
