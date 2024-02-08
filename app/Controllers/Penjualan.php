<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\penjualan_model;
use App\Models\panen_model;

class Penjualan extends Controller
{
    public function index()
    {
        $session = \Config\Services::session();

        if (!$session->has('user')) {
            return redirect()->to(base_url('login'));
        }

        $panenM = new panen_model();
        $panen = $panenM->getPanen();

        $model = new penjualan_model();
        $penjualan = $model->getPenjualan();
        $data = ['penjualan' => $penjualan, 'panen' => $panen];
        return view('penjualan/penjualan_view', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();
        $jumlah = $this->request->getPost('jumlah');
        $harga = $this->request->getPost('harga');
        $total = $jumlah * $harga;
        
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'total' => $total,
        ];

        if ($validation->run($data, 'penjualan') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penjualan'));
        } else {
            $model = new penjualan_model();
            $simpanPenjualan = $model->insertPenjualan($data);
            if ($simpanPenjualan) {
                return redirect()->to(base_url('penjualan'));
            }
        }
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $validation = \Config\Services::validation();
        $jumlah = $this->request->getPost('jumlah');
        $harga = $this->request->getPost('harga');
        $total = $jumlah * $harga;
        
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'total' => $total,
        ];

        if ($validation->run($data, 'penjualan') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penjualan'));
        } else {
            $model = new penjualan_model();
            $ubah = $model->updatePenjualan($data, $id);
            if ($ubah) {
                return redirect()->to(base_url('penjualan'));
            }
        }
    }

    public function delete($id)
    {
        $model = new penjualan_model();
        $hapus = $model->deletePenjualan($id);
        if ($hapus) {
            return redirect()->to(base_url('penjualan'));
        }
    }
}
?>
