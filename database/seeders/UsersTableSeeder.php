<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'email' => 'admin@gmail.com',
                'name' => 'admins',
                'password' => bcrypt('123456')
            ], 
        
            ];
        
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
