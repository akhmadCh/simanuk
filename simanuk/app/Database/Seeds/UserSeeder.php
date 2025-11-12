<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $users = [
            [
                'id_role' => 1, // Peminjam
                'nama_lengkap' => 'Rudy Sanjaya',
                'username' => 'rudys',
                'password' => 'rudy123',
                'organisasi' => 'UKM Musik',
                'email' => 'ukm@ukm.test',
                'kontak' => '081234567890',
            ],
            [
                'id_role' => 2, // Admin
                'nama_lengkap' => 'Admin Sarpras Ibnu',
                'username' => 'admin',
                'password' => 'admin123',
                'organisasi' => 'Fakultas Teknik Prodi Teknologi Informasi',
                'email' => 'admin@sarpras.test',
                'kontak' => '081234567891',
            ],
            [
                'id_role' => 3, // TU
                'nama_lengkap' => 'Staff TU Udin',
                'username' => 'tu',
                'password' => 'tu123',
                'organisasi' => 'Tata Usaha FT',
                'email' => 'tu@tu.test',
                'kontak' => '081234567892',
            ],
            [
                'id_role' => 4, // Pimpinan
                'nama_lengkap' => 'Dekan Fakultas Teknik',
                'username' => 'pimpinan',
                'password' => 'pimpinan123',
                'organisasi' => 'Pimpinan FT',
                'email' => 'pimpinan@ft.test',
                'kontak' => '081234567893',
            ]
        ];

        foreach ($users as $user) {
            $userModel->insert($user);
        }
    }
}
