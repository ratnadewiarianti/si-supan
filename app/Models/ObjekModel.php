<?php

namespace App\Models;

use CodeIgniter\Model;

class ObjekModel extends Model
{
    protected $table            = 'objek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
  
    protected $allowedFields    = ['id_jenis', 'kode_objek', 'uraian_objek'];

   
}
