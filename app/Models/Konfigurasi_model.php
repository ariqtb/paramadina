<?php

namespace App\Models;

use CodeIgniter\Model;

class Konfigurasi_model extends Model
{
    protected $table         = 'konfigurasi';
    protected $primaryKey    = 'id';
    protected $allowedFields = [];

    // Listing
    public function getAll() {
        $builder = $this->db->table('konfigurasi');
        $builder->select('*');
        $builder->orderBy('id', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function getByID($id)
    {
        $builder = $this->db->table('konfigurasi');
        $builder->where('konfigurasi', $id);
        $builder->orderBy('konfigurasi.id', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('konfigurasi');
        $builder->where('id', $data['id']);
        $builder->update($data);
    }
}
