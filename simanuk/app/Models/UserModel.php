<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
   protected $table = 'users';
   protected $primaryKey = 'id';

   protected $allowedFields = [
      'id_role',
      'email',
      'nama_lengkap',
      'organisasi',
      'kontak',
      'username',
      'kontak',
      'status',
      'active',
      'last_active',
   ];
}
