<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John doe',
            'email' => 'john@gmail.com',
            'password' => 'john@123',
            'ids' => [10 , 20 , 30]
        ]);
    }
}
