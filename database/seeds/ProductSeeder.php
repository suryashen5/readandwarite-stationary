<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Faber-Castell',
                'price' => 10000,
                'stock' => 10,
                'stationary_type_id' => 1,
                'description' => 'Ini pensil fabercastell',
                'image' => 'product/fabercastell.jpg'
            ],
            [
                'name' => 'Campus',
                'price' => 20000,
                'stock' => 15,
                'stationary_type_id' => 3,
                'description' => 'Buku campus',
                'image' => 'product/campus.jpg'
            ],
            [
                'name' => 'Joyko',
                'price' => 5000,
                'stock' => 100,
                'stationary_type_id' => 4,
                'description' => 'Penghapus joyko',
                'image' => 'product/joyko.jpg'
            ],
            [
                'name' => 'Plus',
                'price' => 25000,
                'stock' => 50,
                'stationary_type_id' => 6,
                'description' => 'Correction tape plus',
                'image' => 'product/plus.jpg'
            ],
            [
                'name' => 'Snowman',
                'price' => 10000,
                'stock' => 25,
                'stationary_type_id' => 2,
                'description' => 'Pena snowman',
                'image' => 'product/snowman.jpg'
            ],
            [
                'name' => 'Stabilo',
                'price' => 5000,
                'stock' => 20,
                'stationary_type_id' => 5,
                'description' => 'Stabilo stabilo',
                'image' => 'product/stabilo.jpg'
            ],
            [
                'name' => 'Stabilo Exam Grade',
                'price' => 8000,
                'stock' => 12,
                'stationary_type_id' => 4,
                'description' => 'Penghapus stabilo',
                'image' => 'product/stabiloexamgrade.jpg'
            ],
            [
                'name' => 'Staedtler',
                'price' => 6000,
                'stock' => 24,
                'stationary_type_id' => 1,
                'description' => 'Pensil berkualitas',
                'image' => 'product/staedtler.jpg'
            ],
        ];

        foreach ($items as $item) {
            Product::create($item);
        }
    }
}
