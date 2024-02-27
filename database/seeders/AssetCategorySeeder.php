<?php

namespace Database\Seeders;

use App\Models\AssetCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Alat Konstruksi'
            ],
            // [
            //     'name' => 'Elektronik'
            // ],
            // [
            //     'name' => 'Buku'
            // ],
        ];

        foreach ($data as $value) {
            AssetCategory::create($value);
        }
    }
}
