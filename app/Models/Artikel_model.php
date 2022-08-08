<?php

namespace App\Models;

use CodeIgniter\Model;

class Artikel_model extends Model
{
    protected $table         = 'artikel';
    protected $primaryKey    = 'id_artikel';
    protected $allowedFields = [];

    public function getAll() {
        $builder = $this->db->table('artikel');
        $builder->select('*');
        $builder->orderBy('id_artikel', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function count() {
        $builder = $this->db->table('artikel');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('artikel.id_artikel', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('artikel');
        $builder->insert($data);
        // $query = $this->db->table('artikel')->insert($data);
        // return $query;
    }

    public function edit($data)
    {
        $builder = $this->db->table('artikel');
        $builder->where('id_artikel', $data['id_artikel']);
        $builder->update($data);
    }

    public function hapus($id)
    {
        $builder = $this->db->table('artikel');
        $builder->where('id_artikel', $id);
        $builder->delete($data);
    }

    public function getByID($id_artikel)
    {
        $builder = $this->db->table('artikel');
        $builder->where('id_artikel', $id_artikel);
        $builder->orderBy('artikel.id_artikel', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

}
