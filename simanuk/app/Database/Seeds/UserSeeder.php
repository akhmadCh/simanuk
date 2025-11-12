<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\User; // Pastikan menggunakan Entitas kustom Anda
use App\Models\ExtendedUserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Dapatkan User Provider (ExtendedUserModel) dari service auth
        // $users = auth()->getProvider();
        $users = new ExtendedUserModel();

        // 2. Siapkan data. Hapus 'group', 'active', dan timestamps.
        //    Pastikan 'id_role' sesuai dengan 'RoleSeeder' Anda.
        $data = [
            [
                'id_role'       => 1, // Asumsi 1 = admin
                'email'         => 'admin1@sarpras.test',
                'nama_lengkap'  => 'Administrator Sistem',
                'organisasi'    => 'Himpunan Mahasiswa Teknologi Informasi',
                'kontak'        => '081234567890',
                'username'      => 'admin_satu',
                'password'      => 'admin123',
            ],
            [
                'email'         => 'tu@sarpras.test',
                'username'      => 'tu',
                'password'      => 'tu123',
                'id_role'       => 2, // Asumsi 2 = tu
                'nama_lengkap'  => 'Adi',
                'organisasi'    => 'Tata Usaha',
                'kontak'        => '089876543210',
            ],
            [
                'email'         => 'ukm@sarpras.test',
                'username'      => 'ukm_musik',
                'password'      => 'ukm123',
                'id_role'       => 3, // Asumsi 3 = peminjam
                'nama_lengkap'  => 'Rudy Sanjaya',
                'organisasi'    => 'UKM Musik',
                'kontak'        => '087777777777',
            ],
            [
                'email'         => 'pimpinan@sarpras.test',
                'username'      => 'pimpinan1',
                'password'      => 'pimpinan123',
                'id_role'       => 4, // Asumsi 4 = pimpinan
                'nama_lengkap'  => 'Surya',
                'organisasi'    => 'Dekan Fakultas Teknik',
                'kontak'        => '087878787878',
            ]
        ];

        foreach ($data as $userData) {
            // 3. Buat Entitas User baru
            // Masukkan 'password' (teks biasa), mutator di Entity akan
            // secara otomatis mengubahnya menjadi 'password_hash'
            $user = new User($userData);

            // 4. Set aktif secara manual
            $user->active = 1;

            // 5. Simpan user. TIDAK perlu 'withGroup()'.
            // Metode save() akan memicu mutator password.
            $users->save($user);
        }
    }
}
