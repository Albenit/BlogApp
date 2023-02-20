<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            1 => ['name' => 'Test','email' => 'test@gmail.com', 'password' => Hash::make('12345678')],
            2 => ['name' => 'Test2','email' => 'test2@gmail.com', 'password' => Hash::make('12345678')],
 
        ];
        foreach($users as $user){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
        }
    }
}
