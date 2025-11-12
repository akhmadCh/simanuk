<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Sistem Manajemen Sarpras</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
   <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-xl shadow-lg">
      <!-- Header -->
      <div class="text-center">
         <div class="mx-auto h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center">
            <i class="fas fa-tools text-white text-2xl"></i>
         </div>
         <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Sistem Sarpras
         </h2>
         <p class="mt-2 text-sm text-gray-600">
            Fakultas Teknik
         </p>
      </div>

      <!-- Login Form -->
      <form class="mt-8 space-y-6" action="<?= site_url('login') ?>" method="POST">
         <?= csrf_field() ?>

         <!-- Alert Messages -->
         <?php if (session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
               <span class="block sm:inline"><?= session('error') ?></span>
            </div>
         <?php endif; ?>

         <?php if (session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
               <span class="block sm:inline"><?= session('success') ?></span>
            </div>
         <?php endif; ?>

         <!-- Username/Email Field -->
         <div>
            <label for="username" class="block text-sm font-medium text-gray-700">
               Username atau Email
            </label>
            <div class="mt-1 relative">
               <input
                  id="username"
                  name="username"
                  type="text"
                  required
                  class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                  placeholder="Masukkan username atau email"
                  value="<?= old('username') ?>">
               <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                  <i class="fas fa-user text-gray-400"></i>
               </div>
            </div>
         </div>

         <!-- Password Field -->
         <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
               Password
            </label>
            <div class="mt-1 relative">
               <input
                  id="password"
                  name="password"
                  type="password"
                  required
                  class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                  placeholder="Masukkan password">
               <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                  <i class="fas fa-lock text-gray-400"></i>
               </div>
            </div>
         </div>

         <!-- Remember Me & Forgot Password -->
         <div class="flex items-center justify-between">
            <div class="flex items-center">
               <input
                  id="remember"
                  name="remember"
                  type="checkbox"
                  class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
               <label for="remember" class="ml-2 block text-sm text-gray-900">
                  Ingat saya
               </label>
            </div>

            <div class="text-sm">
               <a href="<?= site_url('forgot-password') ?>" class="font-medium text-blue-600 hover:text-blue-500">
                  Lupa password?
               </a>
            </div>
         </div>

         <!-- Submit Button -->
         <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
               <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <i class="fas fa-sign-in-alt text-blue-300 group-hover:text-blue-400"></i>
               </span>
               Masuk ke Sistem
            </button>
         </div>
      </form>

      <!-- Footer -->
      <div class="mt-6 text-center">
         <p class="text-xs text-gray-500">
            &copy; <?= date('Y') ?> Fakultas Teknik. All rights reserved.
         </p>
      </div>
   </div>

   <script>
      // Simple form validation
      document.querySelector('form').addEventListener('submit', function(e) {
         const username = document.getElementById('username').value.trim();
         const password = document.getElementById('password').value;

         if (!username || !password) {
            e.preventDefault();
            alert('Harap isi semua field yang diperlukan');
         }
      });
   </script>
</body>

</html>