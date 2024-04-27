<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkegiatanModel extends Model
{
    protected $table            = 'subkegiatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['id_urusan','id_bidang_urusan', 'id_program','id_kegiatan','kode_subkegiatan','nomenklatur_urusan_provinsi', 'kinerja', 'indikator', 'satuan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSubkegiatan()
    {
        return $this->select('subkegiatan.id, CONCAT(urusan.kode_urusan, \'.\', bidang_urusan.kode_bidang_urusan ,\'.\', program.kode_program,\'.\', kegiatan.kode_kegiatan,\'.\', subkegiatan.kode_subkegiatan) AS kode_subkegiatan1, nomenklatur_urusan_provinsi AS nama_subkegiatan, subkegiatan.kinerja, subkegiatan.indikator, subkegiatan.satuan')
        ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')
        ->join('program', 'program.id = subkegiatan.id_program')
        ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
        ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
        ->findAll();
    }
  
}
