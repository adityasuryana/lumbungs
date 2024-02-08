<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\panen_model;
use App\Models\kategori_model;

class Panen extends Controller
{
    public function index()
    {
        $session = \Config\Services::session();

        if (!$session->has('user')) {
            return redirect()->to(base_url('login'));
        }
        
        $kategoriM = new kategori_model();
        $kategori = $kategoriM->getKategori();

        $model = new panen_model();
        $panen = $model->getPanen();
        $data = ['panen' => $panen, 'kategori' => $kategori];
        return view('panen/panen_view', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah' => $this->request->getPost('jumlah'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($validation->run($data, 'panen') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('panen'));
        } else {
            $model = new panen_model();
            $simpanPanen = $model->insertPanen($data);
            if ($simpanPanen) {
                return redirect()->to(base_url('panen'));
            }
        }
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $validation = \Config\Services::validation();

        $data = array(
            'nama' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah' => $this->request->getPost('jumlah'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        );

        if ($validation->run($data, 'panen') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('panen'));
        } else {
            $model = new panen_model();
            $ubah = $model->updatePanen($data, $id);
            if ($ubah) {
                return redirect()->to(base_url('panen'));
            }
        }
    }

    public function delete($id)
    {
        $model = new panen_model();
        $hapus = $model->deletePanen($id);
        if ($hapus) {
            return redirect()->to(base_url('panen'));
        }
    }
}
?>
