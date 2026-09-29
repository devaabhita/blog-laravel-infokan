<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@infokan.test'],
            ['name' => 'Admin Infokan', 'password' => 'password']
        );
    }
}
