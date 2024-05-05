<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenatausahaanModel extends Model
{
    protected $table            = 'detail_penatausahaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_penatausahaan',
        'id_detail_dpa',
        'id_rekening',
        'no_bk_umum',
        'no_bk_pembantu',
        'asli_123',
        'sudah_terima_dari',
        'uang_sebanyak',
        'untuk_pembayaran',
        'pajak_daerah',
        'pph21',
        'terbilang',
        'status_kwitansi',
        'status_verifikasi'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getDetail($id)
    {
        return $this->select('detail_penatausahaan.*,dpa.nomor_dpa, CONCAT(akun.kode_akun, \'.\', kelompok.kode_kelompok, \'.\', jenis.kode_jenis, \'.\', objek.kode_objek, \'.\', rincian_objek.kode_rincian_objek, \'.\', sub_rincian_objek.kode_sub_rincian_objek) AS kode_rekening')
            ->join('sub_rincian_objek', 'sub_rincian_objek.id = detail_penatausahaan.id_rekening')
            ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')
            ->join('objek', 'objek.id = sub_rincian_objek.id_objek')
            ->join('jenis', 'jenis.id = sub_rincian_objek.id_jenis')
            ->join('kelompok', 'kelompok.id = sub_rincian_objek.id_kelompok')
            ->join('akun', 'akun.id = sub_rincian_objek.id_akun')
            ->join('detail_dpa','detail_dpa.id = detail_penatausahaan.id_detail_dpa')
            ->join('dpa','dpa.id = detail_dpa.id_dpa')
            ->where('detail_penatausahaan.id_penatausahaan', $id)
            ->findAll();
    }

}
