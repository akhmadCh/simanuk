<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
   protected $table = 'inventaris';
   protected $primaryKey = 'id_inventaris';
   protected $useTimestamps = true;
   protected $allowedFields = [
      'nama_barang',
      'kode_inventaris',
      'jumlah',
      'deskripsi',
      'kondisi', // ENUM
      'status_ketersediaan',
      // FK
      'id_kategori',
      'id_lokasi',
   ];

   public function getInventaris($slug = false)
   {
      if ($slug == false) {
         return $this->findAll();
      }
      return $this->where(['slug' => $slug])->first();
   }

   public function getInventarisById($id_event)
   {
      return $this->where(['id_event' => $id_event])->first();
   }
}
