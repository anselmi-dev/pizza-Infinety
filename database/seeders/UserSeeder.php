<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLES: 'developer', 'admin', 'client'

        User::factory()
            ->count(1)
            ->create();

        $user = User::firstOrCreate([
            'name' => 'Develop',
            'email' => 'develop@pizzainfinety.com',
            'role' => 'developer',
            'password' => \Hash::make('dev123')
        ]);

        $user = User::firstOrCreate([
            'name'  => 'Admin',
            'email' => 'admin@pizzainfinety.com',
            'role'  => 'admin',
            'password' => \Hash::make('admin123')
        ]);
    }
}
