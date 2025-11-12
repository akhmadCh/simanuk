<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (auth()->loggedIn()) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'post') {
            $identifier = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $remember = (bool) $this->request->getPost('remember');

            // Cari user by username atau email
            $userModel = new UserModel();
            $user = $userModel->findByIdentifier($identifier);

            if (!$user) {
                return redirect()->back()->with('error', 'Username/Email atau password salah!');
            }

            // Verify password
            if (!$user->verifyPassword($password)) {
                return redirect()->back()->with('error', 'Username/Email atau password salah!');
            }

            // Login user menggunakan Shield
            $auth = auth()->getAuthenticator();
            $auth->login($user, $remember);

            // Set session data tambahan
            session()->set([
                'user_id' => $user->id_user,
                'nama_lengkap' => $user->nama_lengkap,
                'role_id' => $user->id_role,
                'role_name' => $user->getRoleName(),
                'organisasi' => $user->organisasi
            ]);

            return redirect()->to('/dashboard')->with('success', 'Login berhasil! Selamat datang, ' . $user->nama_lengkap);
        }

        return view('auth/login');
    }

    public function logout()
    {
        auth()->logout();
        session()->destroy();

        return redirect()->to('/login')->with('success', 'Logout berhasil!');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }
}
