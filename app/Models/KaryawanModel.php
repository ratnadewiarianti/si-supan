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
        'kategori_pegawai',
        'norek',
        'keterangan',
        'status_ttd',
        'file'
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
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan, karyawan.norek, karyawan.keterangan, karyawan.status_ttd, karyawan.file, karyawan.kategori_pegawai')
            ->where('kategori_pegawai', 'PNS')
            ->get();
        
        return $query->getResultArray();
    }

    public function getKaryawanwithPTT() 
    {
        // Query builder untuk mengambil data karyawab beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('karyawan')
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan, karyawan.norek, karyawan.keterangan, karyawan.status_ttd, karyawan.file, karyawan.kategori_pegawai')
            ->where('kategori_pegawai', 'PTT')
            ->get();
        
        return $query->getResultArray();
    }

    public function getKaryawanwithTenaga() 
    {
        // Query builder untuk mengambil data karyawab beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('karyawan')
            ->select('karyawan.id, karyawan.nama, karyawan.nip, karyawan.jabatan, karyawan.norek, karyawan.keterangan, karyawan.status_ttd, karyawan.file, karyawan.kategori_pegawai')
            ->where('kategori_pegawai', 'Tenaga Ahli')
            ->get();
        
        return $query->getResultArray();
    }


}
