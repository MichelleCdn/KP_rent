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
                'name'            => 'Steger Perancah Scaffolding 1 Set',
                'price'           => 850000,
                'stock'           => 10,
                'size'            => 'Panjang Terpasang = 183 Cm, Lebar Terpasang = 122 Cm, Tinggi Terpasang = 170 Cm, Tebal Pipa = 1.8 Mm',
                'category_id'     => 1,        // perabotan
                'additional_info' => "1 Set MF170 terdiri dari: 2 Pcs Main Frame 170 Cm, 2 Pcs Cross Brace (Silang) 220 Cm, 4 Pcs Join Pin (Socket, Sambungan)",
            ],
            [
                'name'            => 'Cat Walk Scafolding Injekan Kapolding',
                'price'           => 390000,
                'stock'           => 10,
                'size'            => '1 Pcs Cat Walk SNI Panjang 180 Cm Lebar 50 Cm, KETEBALAN PIPA UTAMA 1.8 MM, KETEBALAN PIPA PENUNJANG 1.5 MM',
                'category_id'     => 1,        // perabotan
                'additional_info' => "Spesifikasi Cat Walk Standart SNI",
            ],
            // [
            //     'name'            => 'Proyektor Epson',
            //     'price'           => 50000,
            //     'stock'           => 10,
            //     'size'            => 'S',
            //     'category_id'     => 2,        // elektronik
            //     'additional_info' => "Proyektor Epson EB-S7",
            // ],
        ];

        foreach ($datas as $value) {
            Asset::create($value);
        }
    }
}
