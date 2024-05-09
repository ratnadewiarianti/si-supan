<?php

namespace App\Models;

use CodeIgniter\Model;

class VerifikasiModel extends Model
{
    protected $table            = 'verifikasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['id_detail_penatausahaan','nomor_bku', 'tanggal', 'uraian', 'nilai_spj', 'ppn', 'pph_psl_23', 'pph_psl_22', 'pph_psl_21', 'pajak_daerah', 'diterima', 'file_spj', 'file_kwitansi', 'status_bendahara', 'status_kasubbag', 'status_pptik', 'status_verifikator_keuangan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    
    
//     public function joinDetailPenatausahaan()
// {
//     return $this->join('detail_penatausahaan', 'detail_penatausahaan.id = verifikasi.id_detail_penatausahaan')
//                 ->join('sub_rincian_objek', 'sub_rincian_objek.id = detail_penatausahaan.id_rekening')
//                 ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')
//                 ->join('objek', 'objek.id = sub_rincian_objek.id_objek')
//                 ->join('jenis', 'jenis.id = sub_rincian_objek.id_jenis')
//                 ->join('kelompok', 'kelompok.id = sub_rincian_objek.id_kelompok')
//                 ->join('akun', 'akun.id = sub_rincian_objek.id_akun')
//                 ->join('detail_dpa', 'detail_dpa.id = detail_penatausahaan.id_detail_dpa')
//                 ->join('dpa', 'dpa.id = detail_dpa.id_dpa')
//                 ->join('subkegiatan', 'subkegiatan.id = detail_dpa.id_subkegiatan')
//                 ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
//                 ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
//                 ->join('program', 'program.id = subkegiatan.id_program')
//                 ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')
//                 ->select('verifikasi.*, detail_penatausahaan.*, CONCAT(akun.kode_akun, \'.\', kelompok.kode_kelompok, \'.\', jenis.kode_jenis, \'.\', objek.kode_objek, \'.\', rincian_objek.kode_rincian_objek, \'.\', sub_rincian_objek.kode_sub_rincian_objek) AS kode_rekening, sub_rincian_objek.uraian_sub_rincian_objek, subkegiatan.kode_subkegiatan, subkegiatan.nomenklatur_urusan_provinsi, urusan.kode_urusan, bidang_urusan.kode_bidang_urusan, kegiatan.kode_kegiatan, program.kode_program');
// }

    public function Verifikasi()
    {
        return  $this->select('verifikasi.*, detail_penatausahaan.id_detail_dpa, detail_penatausahaan.id_rekening, detail_dpa.id_subkegiatan, subkegiatan.kode_subkegiatan, subkegiatan.nomenklatur_urusan_provinsi, urusan.kode_urusan, bidang_urusan.kode_bidang_urusan, kegiatan.kode_kegiatan, program.kode_program, CONCAT(akun.kode_akun, \'.\', kelompok.kode_kelompok, \'.\', jenis.kode_jenis, \'.\', objek.kode_objek, \'.\', rincian_objek.kode_rincian_objek, \'.\', sub_rincian_objek.kode_sub_rincian_objek) AS kode_rekening, sub_rincian_objek.uraian_sub_rincian_objek')
        ->join('detail_penatausahaan', 'detail_penatausahaan.id = verifikasi.id_detail_penatausahaan')
        ->join('detail_dpa', 'detail_dpa.id = detail_penatausahaan.id_detail_dpa')
        ->join('subkegiatan', 'subkegiatan.id = detail_dpa.id_subkegiatan')
        ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
        ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
        ->join('program', 'program.id = subkegiatan.id_program')
        ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')

        ->join('rak_belanja', 'rak_belanja.id = detail_penatausahaan.id_rekening')
        ->join('sub_rincian_objek', 'sub_rincian_objek.id = rak_belanja.id_rekening')
        ->join('akun', 'akun.id = sub_rincian_objek.id_akun')
        ->join('kelompok', 'kelompok.id = sub_rincian_objek.id_kelompok')
        ->join('jenis', 'jenis.id = sub_rincian_objek.id_jenis')
        ->join('objek', 'objek.id = sub_rincian_objek.id_objek')
        ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')

        ->findAll();
    }

}
