<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_model extends Model
{
    // Menu layanan
    public function layanan()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.judul_berita, berita.icon, berita.jadwal_siar, berita.gambar, berita.slug_berita, berita.id_berita, berita.isi');
        $builder->where(['status_berita' => 'Publish', 'jenis_berita' => 'Programa 1']);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // Menu profil
    public function profil()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.judul_berita, berita.icon, berita.jadwal_siar, berita.gambar, berita.slug_berita, berita.id_berita, berita.isi');
        $builder->where(['status_berita' => 'Publish', 'jenis_berita' => 'Programa 2']);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // Menu berita
    public function berita()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.id_kategori,berita.icon, berita.jadwal_siar, berita.gambar, berita.gambar, kategori.nama_kategori, kategori.slug_kategori');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->where(['status_berita' => 'Publish', 'jenis_berita' => 'Kegiatan']);
        $builder->groupBy('berita.id_kategori');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // Menu layanan
    public function galeri()
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.judul_berita, galeri.icon, galeri.jadwal_siar, galeri.gambar, galeri.slug_berita, galeri.id_berita, galeri.isi');
        $builder->where(['jenis_galeri' => 'Galeri']);
        $query = $builder->get();

        return $query->getResultArray();
    }

}
