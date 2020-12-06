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
                'description' => 'ini pensil fabercastell',
                'image' => 'product/fabercastell.jpg'
            ]
        ];

        foreach ($items as $item) {
            Product::create($item);
        }
    }
}
