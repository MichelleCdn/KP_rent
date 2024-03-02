<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name'     => 'Super Admin',
            'email'    => 'superadmin@admin.com',
            'password' => bcrypt('qweqweqwe'),
        ]);

        $superadmin->assignRole('super admin');

        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('qweqweqwe'),
        ]);

        $admin->assignRole('admin');
    }
}
