<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel;

class ExtendedUserModel extends UserModel
{
   protected $primaryKey = 'id';
   protected $allowedFields = [
      'id_role',
      'email',
      'nama_lengkap',
      'organisasi',
      'kontak',
      'username',
      'status',
      'password_hash',
      'active',
      'last_active',
      'created_at',
      'updated_at',
   ];

   public function getUserWithRole($userId)
   {
      return $this->select('users.*, roles.nama_role')
         ->join('roles', 'roles.id_role = users.id_role', 'left')
         ->where('users.id', $userId)
         ->first();
   }
}
