<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru_model extends Model
{
    protected $table         = 'guru';
    protected $primaryKey    = 'id_guru';
    protected $allowedFields = [];

    public function getAll()
    {
        $builder = $this->db->table('guru');
        $builder->select('*');
        $builder->orderBy('id_guru', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count()
    {
        $builder = $this->db->table('guru');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('guru.id_guru', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('guru');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('guru');
        $builder->where('id_guru', $data['id_guru']);
        $builder->update($data);
    }

    public function getByID($id_guru)
    {
        $builder = $this->db->table('guru');
        $builder->where('id_guru', $id_guru);
        $builder->orderBy('guru.id_guru', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
