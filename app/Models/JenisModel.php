<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table            = 'jenis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    =  ['id_kelompok','kode_jenis','uraian_jenis'];

}
