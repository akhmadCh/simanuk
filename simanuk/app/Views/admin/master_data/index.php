<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container px-6 py-8 mx-auto">
   <h2 class="text-2xl font-semibold text-gray-700 mb-6">Kelola Data Master</h2>

   <?php if (session()->getFlashdata('message')) : ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
         <?= session()->getFlashdata('message') ?>
      </div>
   <?php endif; ?>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <div class="bg-white shadow rounded-lg p-6">
         <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-700">Kategori Aset</h3>
            <button onclick="openModal('modalKategori')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm font-medium">
               + Tambah Kategori
            </button>
         </div>

         <?php if (session()->has('error_kategori')) : ?>
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3 text-sm">
               <?= implode('<br>', session('error_kategori')) ?>
            </div>
         <?php endif; ?>

         <table class="w-full text-left border-collapse">
            <thead>
               <tr class="bg-gray-50 border-b">
                  <th class="p-3 text-sm font-semibold">Nama Kategori</th>
                  <th class="p-3 text-sm font-semibold w-20">Aksi</th>
               </tr>
            </thead>
            <tbody class="divide-y">
               <?php foreach ($kategori as $k) : ?>
                  <tr>
                     <td class="p-3 text-sm"><?= esc($k['nama_kategori']) ?></td>
                     <td class="p-3 text-center flex justify-center gap-2">
                        <button onclick="openEditKategori('<?= $k['id_kategori'] ?>', '<?= esc($k['nama_kategori']) ?>')"
                           class="text-yellow-600 hover:text-yellow-800 text-xs">
                           Edit
                        </button>

                        <form action="<?= site_url('admin/master/kategori/delete/' . $k['id_kategori']) ?>" method="post" onsubmit="return confirm('Hapus kategori ini?')">
                           <?= csrf_field() ?>
                           <button type="submit" class="text-red-600 hover:text-red-700 text-xs">Hapus</button>
                        </form>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>

      <div class="bg-white shadow rounded-lg p-6">
         <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-700">Lokasi / Gedung</h3>
            <button onclick="openModal('modalLokasi')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm font-medium">
               + Tambah Lokasi
            </button>
         </div>

         <?php if (session()->has('error_lokasi')) : ?>
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3 text-sm">
               <?= implode('<br>', session('error_lokasi')) ?>
            </div>
         <?php endif; ?>

         <table class="w-full text-left border-collapse">
            <thead>
               <tr class="bg-gray-50 border-b">
                  <th class="p-3 text-sm font-semibold">Nama Lokasi</th>
                  <th class="p-3 text-sm font-semibold">Alamat (Opsional)</th>
                  <th class="p-3 text-sm font-semibold w-20">Aksi</th>
               </tr>
            </thead>
            <tbody class="divide-y">
               <?php foreach ($lokasi as $l) : ?>
                  <tr>
                     <td class="p-3 text-sm font-medium"><?= esc($l['nama_lokasi']) ?></td>
                     <td class="p-3 text-sm text-gray-500"><?= esc($l['alamat'] ?: '-') ?></td>
                     <td class="p-3 text-center flex justify-center gap-2">
                        <button onclick="openEditLokasi('<?= $l['id_lokasi'] ?>', '<?= esc($l['nama_lokasi']) ?>')"
                           class="text-yellow-600 hover:text-yellow-800 text-xs">
                           Edit
                        </button>

                        <form action="<?= site_url('admin/master/lokasi/delete/' . $l['id_lokasi']) ?>" method="post" onsubmit="return confirm('Hapus lokasi ini?')">
                           <?= csrf_field() ?>
                           <button type="submit" class="text-red-600 hover:text-red-700 text-xs">Hapus</button>
                        </form>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>

   </div>
</div>

<div id="modalKategori" class="fixed inset-0 z-50 hidden overflow-y-auto">
   <div class="flex items-center justify-center min-h-screen px-4 bg-gray-500 bg-opacity-75">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
         <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Kategori Baru</h3>
         <form action="<?= site_url('admin/master/kategori/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
               <input type="text" name="nama_kategori" required class="w-full border-gray-800 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end space-x-3">
               <button type="button" onclick="closeModal('modalKategori')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
               <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div id="modalLokasi" class="fixed inset-0 z-50 hidden overflow-y-auto">
   <div class="flex items-center justify-center min-h-screen px-4 bg-gray-500 bg-opacity-75">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
         <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Lokasi Baru</h3>
         <form action="<?= site_url('admin/master/lokasi/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lokasi / Gedung</label>
               <input type="text" name="nama_lokasi" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Alamat (Opsional)</label>
               <textarea name="alamat" rows="2" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
               <button type="button" onclick="closeModal('modalLokasi')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
               <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div id="modalEditKategori" class="fixed inset-0 z-50 hidden overflow-y-auto">
   <div class="flex items-center justify-center min-h-screen px-4 bg-gray-500 bg-opacity-75">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
         <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Kategori</h3>
         <form id="formEditKategori" action="" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
               <input type="text" name="nama_kategori" id="editNamaKategori" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end space-x-3">
               <button type="button" onclick="closeModal('modalEditKategori')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
               <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div id="modalEditLokasi" class="fixed inset-0 z-50 hidden overflow-y-auto">
   <div class="flex items-center justify-center min-h-screen px-4 bg-gray-500 bg-opacity-75">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
         <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Lokasi</h3>
         <form id="formEditLokasi" action="" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lokasi / Gedung</label>
               <input type="text" name="nama_lokasi" id="editNamaLokasi" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
               <label class="block text-sm font-medium text-gray-700 mb-1">Alamat (Opsional)</label>
               <textarea name="alamat" id="editAlamatLokasi" rows="2" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
               <button type="button" onclick="closeModal('modalEditLokasi')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
               <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   const BASE_URL = "<?= site_url() ?>";

   // Fungsi Existing
   function openModal(modalId) {
      document.getElementById(modalId).classList.remove('hidden');
   }

   function closeModal(modalId) {
      document.getElementById(modalId).classList.add('hidden');
   }

   // --- FUNGSI BARU UNTUK EDIT ---

   function openEditKategori(id, nama) {
      // 1. Isi nilai input
      document.getElementById('editNamaKategori').value = nama;

      // 2. Update Action Form agar mengarah ke ID yang benar
      const form = document.getElementById('formEditKategori');
      form.action = BASE_URL + 'admin/master/kategori/update/' + id;

      // 3. Buka Modal
      openModal('modalEditKategori');
   }

   function openEditLokasi(id, nama, alamat) {
      // 1. Isi nilai input
      document.getElementById('editNamaLokasi').value = nama;
      document.getElementById('editAlamatLokasi').value = alamat;

      // 2. Update Action Form
      const form = document.getElementById('formEditLokasi');
      form.action = BASE_URL + 'admin/master/lokasi/update/' + id;

      // 3. Buka Modal
      openModal('modalEditLokasi');
   }
</script>
<?= $this->endSection(); ?>