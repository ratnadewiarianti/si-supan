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

    public function getVerifikasi()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('verifikasi')
            ->select('verifikasi.id_detail_penatausahaan, verifikasi.nomor_bku, verifikasi.tanggal, verifikasi.uraian, verifikasi.nilai_spj, verifikasi.ppn, verifikasi.pph_psl_23, verifikasi.pph_psl_22, verifikasi.pph_psl_21, verifikasi.pajak_daerah, verifikasi.diterima, verifikasi.file_spj, verifikasi.file_kwitansi, verifikasi.status_bendahara, verifikasi.status_kasubbag, verifikasi.status_pptik, verifikasi.status_verifikator_keuangan, detail_penatausahaan.id_subkegiatan')
            // ->join('detail_penatausahaan', 'detail_penatausahaan.id = verifikasi.id_detail_penatausahaan')
            // ->where('bidang_urusan.tahun',session()->get('tahun'))
            ->get();
        
        return $query->getResultArray();
    }

    
  
}
