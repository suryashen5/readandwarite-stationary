<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Admin'],
            ['name' => 'Member']
        ];

        foreach ($items as $item) {
            Role::create($item);
        }
    }
}
