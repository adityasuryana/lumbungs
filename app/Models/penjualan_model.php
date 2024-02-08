<?php
namespace App\Models;

use CodeIgniter\Model;

class penjualan_model extends Model
{
    protected $table = 'penjualan';

    public function getPenjualan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function insertPenjualan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePenjualan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deletePenjualan($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getTerjual() {
        $query = $this->db->query("SELECT sum(jumlah) as total FROM penjualan");
        return $query->getRow()->total;
    }

    public function getRevenue() {
        $query = $this->db->query("SELECT sum(total) as total FROM penjualan");
        return $query->getRow()->total;
    }

}
?>