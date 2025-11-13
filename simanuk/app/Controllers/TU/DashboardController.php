<?php

namespace App\Controllers\TU;

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

      $data = [
         'title' => 'Dashboard TU',
         'showSidebar' => true, // flag untuk sidebar
      ];

      return view('tu/dashboard_view', $data);
   }
}
