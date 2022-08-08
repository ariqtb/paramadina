<?php

namespace App\Models;

use CodeIgniter\Model;

class Testimoni_model extends Model
{
    protected $table         = 'testimoni';
    protected $primaryKey    = 'id_testimoni';
    protected $allowedFields = [];

    public function getAll() {
        $builder = $this->db->table('testimoni');
        $builder->select('*');
        $builder->orderBy('id_testimoni', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('testimoni');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('testimoni.id_testimoni', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('testimoni');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('testimoni');
        $builder->where('id_testimoni', $data['id_testimoni']);
        $builder->update($data);
    }

    public function getByID($id_testimoni)
    {
        $builder = $this->db->table('testimoni');
        $builder->where('id_testimoni', $id_testimoni);
        $builder->orderBy('testimoni.id_testimoni', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
