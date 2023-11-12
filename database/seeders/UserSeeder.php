<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Bintang Saputra',
                'email' => 'bintangsaputra@gmail.com',
                'password' => '12345678',
                'role' => 0,
            ],
            [
                'name' => 'Admin Psikotest',
                'email' => 'adminpsikotest@gmail.com',
                'password' => '12345678',
                'role' => 1,
            ],
            [
                'name' => 'Admin Fisik',
                'email' => 'adminfisik@gmail.com',
                'password' => '12345678',
                'role' => 2,
            ],
            [
                'name' => 'Admin Kesehatan',
                'email' => 'adminkesehatan@gmail.com',
                'password' => '12345678',
                'role' => 3,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
