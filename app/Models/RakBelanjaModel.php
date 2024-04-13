<?php

namespace App\Models;

use CodeIgniter\Model;

class RakBelanjaModel extends Model
{
    protected $table            = 'rak_belanja';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['nm_subkegiatan', 'id_rekening', 'nilai_rincian'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function findData()
    {
        $builder = $this->db->table('rak_belanja');
        $builder->select('
            rak_belanja.*,
            data_rekening.akun,
            data_rekening.kelompok,
            data_rekening.jenis,
            data_rekening.objek,
            data_rekening.rincian_object,
            data_rekening.sub_rincian_objek,
            data_rekening.uraian_akun
                    ');
        $builder->join('data_rekening', 'data_rekening.id = rak_belanja.id_rekening');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function findDatabyId($id)
    {
        $builder = $this->db->table('rak_belanja');
        $builder->select('
            rak_belanja.*,rak_belanja.id,
            data_rekening.akun,
            data_rekening.kelompok,
            data_rekening.jenis,
            data_rekening.objek,
            data_rekening.rincian_object,
            data_rekening.sub_rincian_objek,
            data_rekening.uraian_akun
                    ');
        $builder->join('data_rekening', 'data_rekening.id = rak_belanja.id_rekening');
        $builder->where('rak_belanja.id',$id);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getTotalRak($id)
    {
        return $this->db->table('detail_rakbelanja')
            ->where('id_rakbelanja', $id)
            ->countAllResults();
    }

}
