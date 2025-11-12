<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\Shield\Authentication\Passwords;

class User extends Entity
{
   protected $attributes = [
      'id_user' => null,
      'id_role' => null,
      'nama_lengkap' => null,
      'username' => null,
      'password' => null,
      'organisasi' => null,
      'email' => null,
      'kontak' => null,
      'created_at' => null,
      'updated_at' => null,
   ];

   protected $datamap = [];
   protected $dates = ['created_at', 'updated_at'];
   protected $casts = [
      'id_user' => 'integer',
      'id_role' => 'integer',
   ];

   /**
    * Set password dengan hashing menggunakan Shield
    */
   public function setPassword(string $password)
   {
      $this->attributes['password'] = service('passwords')->hash($password);
      return $this;
   }

   /**
    * Verify password menggunakan Shield
    */
   public function verifyPassword(string $password): bool
   {
      return service('passwords')->verify($password, $this->password);
   }

   public function hasRole(string $role): bool
   {
      // return $this->getRoleName() === $role;
      return strtolower($this->getRoleName()) === strtolower($role);
   }

   public function getRoleName(): string
   {
      // 1. Jika sudah ada di cache, langsung kembalikan
      if ($this->roleNameCache !== null) {
         return $this->roleNameCache;
      }

      // 2. Jika user ini (dari tabel 'users') tidak punya id_role
      if (empty($this->attributes['id_role'])) {
         $this->roleNameCache = ''; // Set cache ke kosong
         return '';
      }

      // 3. Ambil dari database (HANYA SEKALI)
      $roleModel = model(RoleModel::class);
      $role = $roleModel->find($this->attributes['id_role']);

      if ($role) {
         // 4. Simpan ke cache dan kembalikan
         $this->roleNameCache = $role['nama_role'];
         return $this->roleNameCache;
      }

      // Jika id_role ada tapi tidak ditemukan di tabel 'roles'
      $this->roleNameCache = '';
      return '';
   }
}
