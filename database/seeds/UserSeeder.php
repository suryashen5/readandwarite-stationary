<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'role_id' => 1,
                'name' => 'Alex',
                'email' => 'alex@readandwarite.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ],
            [
                'role_id' => 2,
                'name' => 'Lexa',
                'email' => 'lexa@member.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
