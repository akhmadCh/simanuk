<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use CodeIgniter\Shield\Entities\User as ShieldUser;
use App\Entities\User;
use App\Models\RoleModel;

class UserModel extends ShieldUserModel
{
   protected $table = 'users';
   protected $primaryKey = 'id_user';

   protected $allowedFields = [
      'id_role',
      'nama_lengkap',
      'username',
      'password',
      'organisasi',
      'email',
      'kontak',
      'created_at',
      'updated_at'
   ];

   protected $useTimestamps = true;
   protected $createdField = 'created_at';
   protected $updatedField = 'updated_at';

   protected $returnType = User::class;

   // Untuk kompatibilitas Shield
   protected $authTable = 'users';

   /**
    * Find user by username atau email
    */
   public function findByIdentifier(string $identifier): ?object
   {
      return $this->where('username', $identifier)
         ->orWhere('email', $identifier)
         ->first();
   }

   // Relationship dengan Role
   public function withRole()
   {
      return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
   }

   public function getRoleName()
   {
      $roleModel = new RoleModel();
      $role = $roleModel->find($this->id_role);
      return $role ? $role->nama_role : 'Unknown';
   }
}
