<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
   protected $table            = 'roles';
   protected $primaryKey       = 'id_role';
   protected $allowedFields = ['nama_role', 'created_at', 'updated_at'];
   protected $useAutoIncrement = true;
   protected $returnType       = 'array';
   protected $useSoftDeletes   = false;

   protected bool $allowEmptyInserts = false;

   // Dates
   protected $useTimestamps = true;
   protected $dateFormat    = 'datetime';
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
}
