<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDPAModel extends Model
{
    protected $table            = 'detail_dpa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['id_dpa','id_subkegiatan','id_rekening','jumlah','jumlah_perubahan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDetailDPA($id)
{
    $query = $this->db->table('detail_dpa')
        ->select('detail_dpa.id, detail_dpa.id_dpa, detail_dpa.jumlah, detail_dpa.jumlah_perubahan, detail_dpa.id_subkegiatan, detail_dpa.id_rekening, subkegiatan.kode_subkegiatan, subkegiatan.nomenklatur_urusan_provinsi, urusan.kode_urusan, bidang_urusan.kode_bidang_urusan, kegiatan.kode_kegiatan, program.kode_program, sub_rincian_objek.uraian_sub_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, dpa.nomor_dpa')
        ->join('dpa', 'dpa.id = detail_dpa.id_dpa')
        ->join('subkegiatan', 'subkegiatan.id = detail_dpa.id_subkegiatan')
        ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
        ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
        ->join('program', 'program.id = subkegiatan.id_program')
        ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')
        ->join('sub_rincian_objek', 'sub_rincian_objek.id = detail_dpa.id_rekening')
        ->join('akun', 'akun.id = sub_rincian_objek.id_akun')
        ->join('kelompok', 'kelompok.id = sub_rincian_objek.id_kelompok')
        ->join('jenis', 'jenis.id = sub_rincian_objek.id_jenis')
        ->join('objek', 'objek.id = sub_rincian_objek.id_objek')
        ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')
        ->where('detail_dpa.id_dpa', $id) // Filter sesuai dengan ID yang diberikan
        ->get(); 

    return $query->getResultArray();
}

    public function getDPA()
    {
        return  $this->select('detail_dpa.*, dpa.nomor_dpa')
        ->join('dpa', 'dpa.id = detail_dpa.id_dpa')
        ->findAll();
    }
    

//     public function getDetailDPA()
// {
//     return $this->select('detail_dpa.*, 
//                           subkegiatan.id AS id_subkegiatan, 
//                           CONCAT(urusan.kode_urusan, \'.\', bidang_urusan.kode_bidang_urusan, \'.\', program.kode_program, \'.\', kegiatan.kode_kegiatan, \'.\', subkegiatan.kode_subkegiatan) AS kode_subkegiatan, 
//                           nomenklatur_urusan_provinsi AS nama_subkegiatan,
//                           sub_rincian_objek.id AS id_rekening, 
//                           CONCAT(akun.kode_akun, \'.\', kelompok.kode_kelompok, \'.\', jenis.kode_jenis, \'.\', objek.kode_objek, \'.\', rincian_objek.kode_rincian_objek, \'.\', sub_rincian_objek.kode_sub_rincian_objek) AS kode_rekening, 
//                           uraian_sub_rincian_objek AS uraian_akun, 
//                           detail_dpa.jumlah, 
//                           detail_dpa.jumlah_perubahan')
//         ->join('dpa', 'dpa.id = detail_dpa.id_dpa')
//         ->join('sub_rincian_objek AS sro_detail_dpa', 'sro_detail_dpa.id = detail_dpa.id_rekening')
//         ->join('rincian_objek', 'rincian_objek.id = sro_detail_dpa.id_rincian_objek')
//         ->join('objek', 'objek.id = sro_detail_dpa.id_objek')
//         ->join('jenis', 'jenis.id = sro_detail_dpa.id_jenis')
//         ->join('kelompok', 'kelompok.id = sro_detail_dpa.id_kelompok')
//         ->join('akun', 'akun.id = sro_detail_dpa.id_akun')
//         ->join('subkegiatan', 'subkegiatan.id = dpa.id_subkegiatan')
//         ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')
//         ->join('program', 'program.id = subkegiatan.id_program')
//         ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
//         ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
//         ->findAll();
// }


}
