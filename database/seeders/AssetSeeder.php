<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'            => 'Meja',
                'price'           => 10000,
                'stock'           => 10,
                'size'            => 'S',
                'category_id'     => 1,        // perabotan
                'additional_info' => "Meja Kayu Kecil",
            ],
            [
                'name'            => 'Kursi',
                'price'           => 8000,
                'stock'           => 10,
                'size'            => 'S',
                'category_id'     => 1,        // perabotan
                'additional_info' => "Kursi Kayu Kecil",
            ],
            [
                'name'            => 'Proyektor Epson',
                'price'           => 50000,
                'stock'           => 10,
                'size'            => 'S',
                'category_id'     => 2,        // elektronik
                'additional_info' => "Proyektor Epson EB-S7",
            ],
        ];

        foreach ($datas as $value) {
            Asset::create($value);
        }
    }
}
