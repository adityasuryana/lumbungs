<?php
namespace App\Models;

use CodeIgniter\Model;

class kategori_model extends Model
{
    protected $table = 'kategori';

    public function getKategori($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function insertKategori($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKategori($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteKategori($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getTotalKategori() {
        $query = $this->db->query("SELECT count(*) as total FROM kategori");
        return $query->getRow()->total;
    }

}
?>