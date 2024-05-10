<?php

namespace App\Models;

use CodeIgniter\Model;

class PenatausahaanModel extends Model
{
    protected $table            = 'penatausahaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['link_google', 'karyawan_1', 'karyawan_2', 'karyawan_3', 'tanggal'];



    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getPenatausahaan()
    {
        return $this->select('penatausahaan.id , penatausahaan.link_google, karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2 ,karyawan_3.nama AS nama_karyawan_3, penatausahaan.tanggal')
            ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
            ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
            ->join('karyawan AS karyawan_3', 'karyawan_3.id = penatausahaan.karyawan_3')
            ->findAll();
    }

}
