<?php
namespace App\Models;

use CodeIgniter\Model;

class panen_model extends Model
{
    protected $table = 'panen';

    public function getPanen($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function insertPanen($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePanen($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deletePanen($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getTotalPanen() {
        $query = $this->db->query("SELECT SUM(jumlah) as total FROM panen");
        return $query->getRow()->total;
    }

}
?>