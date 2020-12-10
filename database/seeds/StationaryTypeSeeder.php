<?php

use App\StationaryType;
use Illuminate\Database\Seeder;

class StationaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'pensil','image' => 'type/pensil.jpg'],
            ['name' => 'pena','image' => 'type/pena.png'],
            ['name' => 'buku','image' => 'type/buku.jpg'],
            ['name' => 'penghapus','image' => 'type/penghapus.jpg'],
            ['name' => 'highlighter','image' => 'type/highlighter.jpg'],
            ['name' => 'correctiontape','image' => 'type/correctiontape.jpg'],
        ];

        foreach ($items as $item) {
            StationaryType::create($item);
        }
    }
}
