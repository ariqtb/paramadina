<?php

namespace App\Models;

use CodeIgniter\Model;

class Iklan_model extends Model
{
    protected $table              = 'pesan_iklan';
    protected $primaryKey         = 'id_pesan';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = [''];
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
                        
    // listing
    public function listing()
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // home
    public function home()
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->where('status_pesan', 'Publish');
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // testimoni
    public function testimoni()
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->where('status_pesan', 'Publish');
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $builder->limit(10);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_pesan)
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->where('id_pesan', $id_pesan);
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_pesan)
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->where('slug_pesan', $slug_pesan);
        $builder->orderBy('pesan_iklan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('pesan_iklan');
        $builder->where('id_pesan', $data['id_pesan']);
        $builder->update($data);
    }
}