<?php

namespace App\Controllers\Peminjam;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
   protected $userModel;

   public function __construct()
   {
      $this->userModel = auth()->getProvider();
   }

   public function index()
   {
      $user = auth()->user();
      // $userData = $this->userModel->getUserWithRole($user->id);

      $data = [
         'title' => 'Dashboard Peminjam',
         'showSidebar' => true, // flag untuk sidebar
      ];

      return view('peminjam/dashboard_view', $data);
   }
}
