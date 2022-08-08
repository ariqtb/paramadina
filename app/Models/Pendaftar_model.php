<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftar_model extends Model
{
    protected $table         = 'pendaftar';
    protected $primaryKey    = 'id_pendaftar';
    protected $allowedFields = [
        'nama_pelajar'
    ];

    public function getAll() {
        $builder = $this->db->table('pendaftar');
        $builder->select('*');
        $builder->orderBy('id_pendaftar', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function getByID($id_pendaftar)
    {
        $builder = $this->db->table('pendaftar');
        $builder->where('id_pendaftar', $id_pendaftar);
        $builder->orderBy('pendaftar.id_pendaftar', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('pendaftar');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('pendaftar.id_pendaftar', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('pendaftar');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('pendaftar');
        $builder->where('id_pendaftar', $data['id_pendaftar']);
        $builder->update($data);
    }
}
