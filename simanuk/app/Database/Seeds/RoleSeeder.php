<?php

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
            'null' => false,
         ],
         'created_at' => [
            'type' => 'DATETIME',
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP',
         ],
         'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
         ],
      ]);
      $this->forge->addPrimaryKey('id_role');
      $this->forge->createTable('role');

      // Insert default roles
      $this->insertDefaultRoles();
   }

   public function down()
   {
      $this->forge->dropTable('role');
   }

   private function insertDefaultRoles()
   {
      $roles = ['Peminjam', 'Admin', 'TU', 'Pimpinan'];

      foreach ($roles as $role) {
         $this->db->table('role')->insert([
            'nama_role' => $role,
            'created_at' => date('Y-m-d H:i:s')
         ]);
      }
   }
}
