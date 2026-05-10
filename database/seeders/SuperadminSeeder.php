<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    public function run(): void
    {
        Superadmin::updateOrCreate(
            ['email' => 'superadmin@urlshortner.com'],
            [
                'name'     => 'Super Admin',
                'email'    => 'superadmin@urlshortner.com',
                'password' => Hash::make('superadmin123'),
            ]
        );
    }
}
