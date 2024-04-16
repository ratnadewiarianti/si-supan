<?php

namespace App\Models;

use CodeIgniter\Model;

class SubRincianObjekModel extends Model
{
    protected $table            = 'sub_rincian_objek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
  
    protected $allowedFields    = ['id_rincian_objek','kode_sub_rincian_objek','uraian_sub_rincian_objek'];

  
}
