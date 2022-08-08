<?php

namespace App\Models;

use CodeIgniter\Model;

class Program_model extends Model
{
    protected $table         = 'program';
    protected $primaryKey    = 'id_program';
    protected $allowedFields = [];

    public function getAll() {
        $builder = $this->db->table('program');
        $builder->select('*');
        $builder->orderBy('id_program', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('program');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('program.id_program', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('program');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('program');
        $builder->where('id_program', $data['id_program']);
        $builder->update($data);
    }

    public function getByID($id_program)
    {
        $builder = $this->db->table('program');
        $builder->where('id_program', $id_program);
        $builder->orderBy('program.id_program', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
