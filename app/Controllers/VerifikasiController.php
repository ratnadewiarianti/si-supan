<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VerifikasiModel;
use App\Models\DetailPenatausahaanModel;
use App\Models\SubkegiatanModel;
use App\Models\SubRincianObjekModel;
class VerifikasiController extends BaseController
{
    protected $VerifikasiModel;
    protected $DetailPenatausahaanModel;
    protected $SubkegiatanModel;
    protected $SubRincianObjekModel;
    public function __construct()
    {
        $this->VerifikasiModel = new VerifikasiModel();
        $this->DetailPenatausahaanModel = new DetailPenatausahaanModel();
        $this->SubkegiatanModel = new SubkegiatanModel();
        $this->SubRincianObjekModel = new SubRincianObjekModel();
    }

    public function index()
    {
        // $verifikasi = $this->VerifikasiModel->getVerifikasi();
        $verifikasi = $this->VerifikasiModel->findAll();

        return view('verifikasi/index', ['verifikasi' => $verifikasi]);
    }

    public function create()
    {
        $data['detailpenatausahaan'] = $this->DetailPenatausahaanModel->getDetailPenatausahaan();
        return view('verifikasi/create', $data);
    }

    public function store()
    {
        $data = [
            'id_detail_penatausahaan' => $this->request->getPost('id_detail_penatausahaan'),
            'nomor_bku' => $this->request->getPost('nomor_bku'),
            'tanggal' => $this->request->getPost('tanggal'),
            'uraian' => $this->request->getPost('uraian'),
            'nilai_spj' => $this->request->getPost('nilai_spj'),
            'ppn' => $this->request->getPost('ppn'),
            'pph_psl_23' => $this->request->getPost('pph_psl_23'),
            'pph_psl_22' => $this->request->getPost('pph_psl_22'),
            'pph_psl_21' => $this->request->getPost('pph_psl_21'),
            'pajak_daerah' => $this->request->getPost('pajak_daerah'),
            'diterima' => $this->request->getPost('diterima'),
            'file_spj' => $this->request->getPost('file_spj'),
            'file_kwitansi' => $this->request->getPost('file_kwitansi'),
            // 'status_bendahara' => $this->request->getPost('status_bendahara'),
            // 'status_kasubbag' => $this->request->getPost('status_kasubbag'),
            // 'status_pptik' => $this->request->getPost('status_pptik'),
            // 'status_verifikator_keuangan' => $this->request->getPost('status_verifikator_keuangan'),
        ];

        $this->VerifikasiModel->insert($data);

        return redirect()->to('/verifikasi');
    }


    public function edit($id)
    {
        $data = [
            'verifikasi' => $this->VerifikasiModel->find($id),
            'detail_penatausahaan' => $this->DetailPenatausahaanModel->findAll()
        ];
        return view('verifikasi/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_detail_penatausahaan' => $this->request->getPost('id_detail_penatausahaan'),
            'nomor_bku' => $this->request->getPost('nomor_bku'),
            'tanggal' => $this->request->getPost('tanggal'),
            'uraian' => $this->request->getPost('uraian'),
            'nilai_spj' => $this->request->getPost('nilai_spj'),
            'ppn' => $this->request->getPost('ppn'),
            'pph_psl_23' => $this->request->getPost('pph_psl_23'),
            'pph_psl_22' => $this->request->getPost('pph_psl_22'),
            'pph_psl_21' => $this->request->getPost('pph_psl_21'),
            'pajak_daerah' => $this->request->getPost('pajak_daerah'),
            'diterima' => $this->request->getPost('diterima'),
            'file_spj' => $this->request->getPost('file_spj'),
            'file_kwitansi' => $this->request->getPost('file_kwitansi'),
        ];

        $this->VerifikasiModel->update($id, $data);

        return redirect()->to('verifikasi');
    }

    public function destroy($id)
    {
        $this->VerifikasiModel->delete($id);

        return redirect()->to('/verifikasi');
    }
}
