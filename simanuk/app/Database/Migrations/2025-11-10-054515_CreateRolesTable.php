<?php
// app/Database/Migrations/2024-01-01-000000_CreateRoleTable.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_role' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_role' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_role');
        $this->forge->createTable('roles');

        // Insert default data
        $this->db->table('roles')->insertBatch([
            ['nama_role' => 'Peminjam', 'created_at' => date('Y-m-d H:i:s')],
            ['nama_role' => 'Admin', 'created_at' => date('Y-m-d H:i:s')],
            ['nama_role' => 'TU', 'created_at' => date('Y-m-d H:i:s')],
            ['nama_role' => 'Pimpinan', 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
