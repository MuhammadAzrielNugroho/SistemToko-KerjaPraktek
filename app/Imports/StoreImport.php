<?php

namespace App\Imports;

use App\Models\Store;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StoreImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {

            // skip header
            if ($index < 2) continue; // karena excel kamu mulai dari baris 3

            if (empty($row[2])) continue; // nama toko

            // 🔥 CATEGORY (dari kolom PRODUK)
            $category = Category::firstOrCreate([
                'name' => $row[4] ?? 'Umum'
            ]);

            // 🔥 CITY (dari kolom KOTA/KAB)
            $city = City::firstOrCreate([
                'name' => $row[7] ?? 'Tidak diketahui'
            ]);

            // 🔥 AMBIL ANGKA DARI "5 tahun"
            $storeAge = preg_replace('/[^0-9]/', '', $row[6]);

            Store::create([
                'store_name' => $row[2],
                'store_id' => $row[3],
                'category_id' => $category->id,
                'city_id' => $city->id,
                'total_products' => $row[5] ?? 0,
                'store_age' => $storeAge ?: 0,
                'description' => null,
            ]);
        }
    }
}