<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<?= $title ?? 'Dashboard' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-gray-100">
   <div class="max-w-7xl mx-auto py-8 px-4">
      <div class="bg-white rounded-lg shadow-lg p-6">
         <h1 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang di Dashboard</h1>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Stats -->
            <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
               <div class="flex items-center">
                  <i class="fas fa-boxes text-blue-600 text-2xl mr-4"></i>
                  <div>
                     <p class="text-sm text-blue-600">Total Inventaris</p>
                     <p class="text-2xl font-bold text-blue-800">150</p>
                  </div>
               </div>
            </div>

            <div class="bg-green-50 p-6 rounded-lg border border-green-200">
               <div class="flex items-center">
                  <i class="fas fa-calendar-check text-green-600 text-2xl mr-4"></i>
                  <div>
                     <p class="text-sm text-green-600">Peminjaman Aktif</p>
                     <p class="text-2xl font-bold text-green-800">12</p>
                  </div>
               </div>
            </div>

            <div class="bg-orange-50 p-6 rounded-lg border border-orange-200">
               <div class="flex items-center">
                  <i class="fas fa-exclamation-triangle text-orange-600 text-2xl mr-4"></i>
                  <div>
                     <p class="text-sm text-orange-600">Laporan Kerusakan</p>
                     <p class="text-2xl font-bold text-orange-800">3</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection() ?>