<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table         = 'user';
    protected $primaryKey    = 'id_user';
    protected $allowedFields = [];

    public function getAll() {
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->orderBy('id_user', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('user');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('user.id_user', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function edit($data)
    {
        $builder = $this->db->table('user');
        $builder->where('id_user', $data['id_user']);
        $builder->update($data);
    }

    public function getByID($id_user)
    {
        $builder = $this->db->table('user');
        $builder->where('id_user', $id_user);
        $builder->orderBy('user.id_user', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('user');
        $builder->insert($data);
    }
}
