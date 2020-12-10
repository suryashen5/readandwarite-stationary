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
                'name' => 'Admin',
                'email' => 'admin@readandwarite.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'//password
            ],
            [
                'role_id' => 2,
                'name' => 'Member',
                'email' => 'member@member.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'//password
            ]
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
