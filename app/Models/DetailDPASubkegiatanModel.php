<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDPASubkegiatanModel extends Model
{
    protected $table            = 'detail_dpa_subkegiatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['id_detail_dpa','uraian','koefisien','satuan','harga','ppn','jumlah','keterangan','koefisien_perubahan','satuan_perubahan','harga_perubahan','ppn_perubahan','jumlah_perubahan','keterangan_perubahan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

     

}
