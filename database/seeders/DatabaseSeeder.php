<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $items = [
            ['kode_barang' => 'B001', 'nama_barang' => 'Buku Tulis', 'harga' => 5000, 'stok' => 20],
            ['kode_barang' => 'B002', 'nama_barang' => 'Pulpen', 'harga' => 3000, 'stok' => 15],
            ['kode_barang' => 'B003', 'nama_barang' => 'Pensil', 'harga' => 2000, 'stok' => 25],
        ];

        foreach ($items as $item) {
            Barang::firstOrCreate(
                ['kode_barang' => $item['kode_barang']],
                $item
            );
        }
    }
}
