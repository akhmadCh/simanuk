<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>

<?php
// DEBUG: Cek apakah user sudah login
if (auth()->loggedIn()) {
   echo '<div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">';
   echo 'PERINGATAN: Anda sudah login! <a href="/logout" class="underline">Logout di sini</a>';
   echo '</div>';
}
?>

<div class="bg-white shadow-lg rounded-lg flex overflow-hidden w-[800px]">
   <!-- Bagian Kiri -->
   <div class="w-1/2 p-10 flex flex-col justify-center">
      <h2 class="text-lg font-semibold text-gray-700">Fakultas Teknik</h2>
      <h1 class="text-3xl font-bold mt-2 mb-4">Selamat Datang!</h1>
      <p class="text-gray-500 mb-6">Silakan masuk untuk mengakses sistem inventaris.</p>

      <form action="<?= url_to('login') ?>" method="post">
         <?= csrf_field() ?>

         <?php if (session('error')): ?>
            <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
               <?= session('error') ?>
            </div>
         <?php elseif (session('errors') !== null): ?>
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
               <?php if (is_array(session('errors'))) : ?>
                  <?php foreach (session('errors') as $error) : ?>
                     <p><?= esc($error) ?></p>
                  <?php endforeach ?>
               <?php else : ?>
                  <p><?= esc(session('errors')) ?></p>
               <?php endif ?>
            </div>
         <?php endif; ?>

         <?php if (session('errors.login') || session('errors.password')): ?>
            <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
               <?= session('errors.login') ?? '' ?><br>
               <?= session('errors.password') ?? '' ?>
            </div>
         <?php endif; ?>

         <label class="block mb-2 text-sm font-medium text-gray-600">Email</label>
         <input
            type="email"
            id="email"
            name="email"
            inputmode="email"
            autocomplete="email"
            placeholder="<?= lang('Auth.email') ?>"
            value="<?= old('email') ?>"
            class="w-full p-2 border rounded-md mb-4 focus:ring-2 focus:ring-blue-400">

         <label class="block mb-2 text-sm font-medium text-gray-600">Password</label>
         <input
            type="password"
            id="password"
            name="password"
            inputmode="text"
            autocomplete="current-password"
            placeholder="<?= lang('Auth.password') ?>"
            class="w-full p-2 border rounded-md mb-4 focus:ring-2 focus:ring-blue-400">

         <!-- Remember me -->
         <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
            <div class="form-check">
               <label class="form-check-label">
                  <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                  <?= lang('Auth.rememberMe') ?>
               </label>
            </div>
         <?php endif; ?>

         <div class="text-right mb-4">
            <!-- url forgot-password -->
         </div>

         <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-semibold"><?= lang('Auth.login') ?>
            Masuk
         </button>
      </form>
   </div>

   <!-- Kanan -->
   <div class="w-1/2">
      <img src="<?= base_url('images/login/fakultas-teknik.jpg') ?>" alt="Fakultas Teknik"
         class="w-full h-full object-cover">
   </div>
</div>

<?= $this->endSection() ?>