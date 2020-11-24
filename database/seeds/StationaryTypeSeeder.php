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
            ['name' => 'pensil','image' => 'type/pensil.jpg']
        ];

        foreach ($items as $item) {
            StationaryType::create($item);
        }
    }
}
