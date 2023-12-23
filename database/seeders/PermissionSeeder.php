<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'        => 'super admin',
                'permissions' => [
                    'can read assets',

                    'can read transactions',
                    'can create transactions',

                    'can show summaries',
                ]
            ],
            [
                'name'        => 'admin',
                'permissions' => [
                    'can create assets',
                    'can read assets',
                    'can update assets',
                    'can delete assets',

                    'can create users',
                    'can read users',
                    'can update users',
                    'can delete users',

                    'can read transactions',
                    'can create transactions',
                    'can update transactions',
                ]
            ],
        ];

        $permissions = [
            'can create assets',
            'can read assets',
            'can update assets',
            'can delete assets',

            'can create users',
            'can read users',
            'can update users',
            'can delete users',

            'can read transactions',
            'can create transactions',
            'can update transactions',
            'can show summaries',
        ];

        //craete permission first
        foreach ($permissions as $key => $data) {
            Permission::create([
                'name' => $data
            ]);
        }

        foreach ($roles as $key => $data) {
            $role = Role::create([
                'name' => $data['name']
            ]);
            foreach ($data['permissions'] as $key => $value) {
                $role->givePermissionTo($value);
                
            }
        }
    }
}
