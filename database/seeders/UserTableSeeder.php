<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin@admin.com",
            'password' => "11111111",
            'active' => true
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');
        
        $superAdminUser = User::create([
            'first_name' => "Admin",
            'last_name' => "Toxsl",
            'email' => "admin@toxsl.in",
            'password' => "Admin@123",
            'active' => true
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('STUDENT');
        });
    }
}
