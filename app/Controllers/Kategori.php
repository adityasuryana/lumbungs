<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\kategori_model;

class Kategori extends Controller
{
    public function index()
    {
        $session = \Config\Services::session();

        if (!$session->has('user')) {
            return redirect()->to(base_url('login'));
        }

        $model = new kategori_model();
        $kategori = $model->getKategori();
        $data = ['kategori' => $kategori];
        return view('kategori/kategori_view', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($validation->run($data, 'kategori') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kategori'));
        } else {
            $model = new kategori_model();
            $simpanKategori = $model->insertKategori($data);
            if ($simpanKategori) {
                return redirect()->to(base_url('kategori'));
            }
        }
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $validation = \Config\Services::validation();

        $data = array(
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        );

        if ($validation->run($data, 'kategori') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kategori'));
        } else {
            $model = new kategori_model();
            $ubah = $model->updateKategori($data, $id);
            if ($ubah) {
                return redirect()->to(base_url('kategori'));
            }
        }
    }

    public function delete($id)
    {
        $model = new kategori_model();
        $hapus = $model->deleteKategori($id);
        if ($hapus) {
            return redirect()->to(base_url('kategori'));
        }
    }
}
?>
