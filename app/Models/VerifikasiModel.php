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




    public function verifikasi()
    {
        return $this->select('verifikasi.*, detail_penatausahaan.id_detail_dpa, detail_penatausahaan.id_rekening, detail_dpa.id_subkegiatan, subkegiatan.kode_subkegiatan, subkegiatan.nomenklatur_urusan_provinsi, urusan.kode_urusan, bidang_urusan.kode_bidang_urusan, kegiatan.kode_kegiatan, program.kode_program, CONCAT(akun.kode_akun, \'.\', kelompok.kode_kelompok, \'.\', jenis.kode_jenis, \'.\', objek.kode_objek, \'.\', rincian_objek.kode_rincian_objek, \'.\', sub_rincian_objek.kode_sub_rincian_objek) AS kode_rekening, sub_rincian_objek.uraian_sub_rincian_objek')
        ->join('detail_penatausahaan', 'detail_penatausahaan.id = verifikasi.id_detail_penatausahaan')
        ->join('detail_dpa', 'detail_dpa.id = detail_penatausahaan.id_detail_dpa')
        ->join('subkegiatan', 'subkegiatan.id = detail_dpa.id_subkegiatan')
        ->join('urusan', 'urusan.id = subkegiatan.id_urusan')
        ->join('bidang_urusan', 'bidang_urusan.id = subkegiatan.id_bidang_urusan')
        ->join('program', 'program.id = subkegiatan.id_program')
        ->join('kegiatan', 'kegiatan.id = subkegiatan.id_kegiatan')
        ->join('sub_rincian_objek', 'sub_rincian_objek.id = detail_penatausahaan.id_rekening')
        ->join('akun', 'akun.id = sub_rincian_objek.id_akun')
        ->join('kelompok', 'kelompok.id = sub_rincian_objek.id_kelompok')
        ->join('jenis', 'jenis.id = sub_rincian_objek.id_jenis')
        ->join('objek', 'objek.id = sub_rincian_objek.id_objek')
        ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')
        ->findAll();
    }





    public function updateStatusBendahara($id, $status)
{
    $data = [
        'status_bendahara' => $status
    ];

    $this->where('id', $id)->set($data)->update();

    // Periksa apakah ada baris yang terpengaruh (diupdate)
    return $this->db->affectedRows() > 0;
}

}
