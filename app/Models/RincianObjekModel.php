<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianObjekModel extends Model
{
    protected $table            = 'rincian_objek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    =  ['id_objek','kode_rincian_objek','uraian_rincian_objek'];

 
}
