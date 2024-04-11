<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    protected $allowedFields    = [
        'jabatan',
        'nip',
        'nama',
        'kategori_pegawai'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKaryawanwithPNS() 
    {
        // Query builder untuk mengambil data karyawab beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('karyawan')
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan')
            ->where('kategori_pegawai', 'PNS')
            ->get();
        
        return $query->getResultArray();
    }

    public function getKaryawanwithPTT() 
    {
        // Query builder untuk mengambil data karyawab beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('karyawan')
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan')
            ->where('kategori_pegawai', 'PTT')
            ->get();
        
        return $query->getResultArray();
    }

    public function getKaryawanwithTenaga() 
    {
        // Query builder untuk mengambil data karyawab beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('karyawan')
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan')
            ->where('kategori_pegawai', 'Tenaga Ahli')
            ->get();
        
        return $query->getResultArray();
    }


}
