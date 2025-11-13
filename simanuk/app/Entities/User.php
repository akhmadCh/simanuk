<?php

namespace App\Entities;

use CodeIgniter\Shield\Entities\User as ShieldUser;
use App\Models\RoleModel;

class User extends ShieldUser
{
   protected $table = 'users';
   protected $primaryKey = 'id';
   protected ?string $roleNameCache = null;

   // PENTING: Tambahkan field kustom ke $datamap agar bisa di-set via constructor
   protected $datamap = [];

   protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
   ];

   // field yang ada di shield
   protected $casts = [
      'id'          => 'int',
      'id_role'     => 'int',
      'active'      => 'boolean',
      'created_at'  => 'datetime',
      'updated_at'  => 'datetime',
      'deleted_at'  => 'datetime',
   ];

   // field yang ada di ERD
   // tambahkan ke $attributes agar bisa diisi
   protected $attributes = [
      'id_role'      => null,
      'nama_lengkap' => null,
      'organisasi'   => null,
      'kontak'       => null,
   ];

   public function hasRole(string $role): bool
   {
      return strtolower($this->getRoleName()) === strtolower($role);
   }

   public function getRoleName(): string
   {
      if ($this->roleNameCache !== null) {
         return $this->roleNameCache;
      }

      if (empty($this->attributes['id_role'])) {
         $this->roleNameCache = '';
         return '';
      }

      $roleModel = model(RoleModel::class);
      $role = $roleModel->find($this->attributes['id_role']);

      if ($role) {
         $this->roleNameCache = $role['nama_role'];
         return $this->roleNameCache;
      }

      $this->roleNameCache = '';
      return '';
   }
}
