<?php

namespace App\Controllers;
use App\Models\panen_model;
use App\Models\kategori_model;
use App\Models\penjualan_model;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        // Pengecekan jika pengguna belum login
        if (!$session->has('user')) {
            return redirect()->to(base_url('login'));
        }
        $model = new panen_model();
        $panen = $model->getPanen();
        $totalPanen['totalPanen'] = $model->getTotalPanen();

        $model1 = new kategori_model();
        $totalKategori['totalKategori'] = $model1->getTotalKategori();

        $model2 = new penjualan_model();
        $totalTerjual = array('totalTerjual' => $model2->getTerjual());
        $revenue = array('revenue' => $model2->getRevenue());

        $data = ['panen' => $panen, 'totalPanen' => $totalPanen, 'totalKategori' => $totalKategori, 'totalTerjual' => $totalTerjual, 'revenue' => $revenue];
        echo view('dashboard', $data);
    }
    
    
}
