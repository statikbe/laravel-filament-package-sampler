<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the user seeder.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'block@example.com'], [
            'name' => 'Block',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
