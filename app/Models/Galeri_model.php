<?php

namespace App\Models;

use CodeIgniter\Model;

class Galeri_model extends Model
{
    protected $table         = 'galeri';
    protected $primaryKey    = 'id_galeri';
    protected $allowedFields = [];

    // Listing
    public function getAll() {
        $builder = $this->db->table('galeri');
        $builder->select('*');
        $builder->orderBy('id_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('galeri');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder=$this->db->table('galeri');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('galeri');
        $builder->where('id_galeri', $data['id_galeri']);
        $builder->update($data);
    }

    public function getByID($id_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->where('id_galeri', $id_galeri);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
