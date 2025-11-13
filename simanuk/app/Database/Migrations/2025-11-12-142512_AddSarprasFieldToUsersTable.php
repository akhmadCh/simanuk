<?php
// app/Database/Migrations/2025-11-12-142512_AddCustomFieldsToUsers.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomFieldsToUsers extends Migration
{
    public function up()
    {
        // Tambahkan HANYA field yang BELUM ADA di Shield's users table
        $fields = [
            'id_role' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
                'after'      => 'id',
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
                'after'      => 'id_role',
            ],
            'organisasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'nama_lengkap',
            ],
            'kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'organisasi',
            ],
        ];

        $this->forge->addColumn('users', $fields);

        // Tambahkan Foreign Key
        $this->db->query('ALTER TABLE `users` ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles`(`id_role`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        // Hapus Foreign Key dulu
        $this->forge->dropForeignKey('users', 'users_id_role_foreign');

        // Hapus kolom-kolom
        $this->forge->dropColumn('users', [
            'id_role',
            'nama_lengkap',
            'organisasi',
            'kontak',
        ]);
    }
}
