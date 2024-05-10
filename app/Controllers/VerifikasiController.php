<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VerifikasiModel;
use App\Models\DetailPenatausahaanModel;
use App\Models\SubkegiatanModel;
use App\Models\SubRincianObjekModel;
use CodeIgniter\HTTP\Files\UploadedFile;
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

    // public function index()
    // {
    //     $verifikasiModel = new VerifikasiModel();
    //     $verifikasi = $verifikasiModel->joinDetailPenatausahaan()->findAll();
    //     $lastQuery = $verifikasiModel->getLastQuery();
    //     // echo $lastQuery;
        

    //     return view('verifikasi/index', ['verifikasi' => $verifikasi]);
    // }

    public function index()
    {
        $data['verifikasi'] = $this->VerifikasiModel->Verifikasi();
        return view('verifikasi/index', $data);
    }

    public function create()
    {
        $data['detailpenatausahaan'] = $this->DetailPenatausahaanModel->getCariDataVerifikasi();
        return view('verifikasi/create', $data);
    }

    public function store()
{
    // Simpan file SPJ
    $fileSPJ = $this->request->getFile('file_spj');
    $fileSPJ->move(ROOTPATH . 'public/uploads/spj');

    // Simpan file kwitansi
    $fileKwitansi = $this->request->getFile('file_kwitansi');
    $fileKwitansi->move(ROOTPATH . 'public/uploads/kwitansi');

    // Buat array data untuk disimpan
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
        'file_spj' => $fileSPJ->getName(),
        'file_kwitansi' => $fileKwitansi->getName(),
        'status_bendahara' => $this->request->getPost('status_bendahara'),
        'status_kasubbag' => $this->request->getPost('status_kasubbag'),
        'status_pptik' => $this->request->getPost('status_pptik'),
        'status_verifikator_keuangan' => $this->request->getPost('status_verifikator_keuangan'),
    ];

    $this->VerifikasiModel->insert($data);

    return redirect()->to('/verifikasi');
}

    public function edit($id)
    {
        // Ambil data detail DPA berdasarkan ID
        $verifikasi = $this->VerifikasiModel->find($id);
        $detailpenatausahaan = $this->DetailPenatausahaanModel->getCariDataVerifikasi();  

        $data = [
            'verifikasi' => $verifikasi,
            'detailpenatausahaan' => $detailpenatausahaan,
        ];
    
        return view('verifikasi/edit', $data);
    }

    public function update($id)
    {
        // Dapatkan data verifikasi yang akan diupdate
        $verifikasi = $this->VerifikasiModel->find($id);

        // Simpan file SPJ baru jika diunggah
        $fileSPJ = $this->request->getFile('file_spj');
        if ($fileSPJ->isValid()) {
            // Hapus file SPJ lama jika sudah ada
            if (!empty($verifikasi['file_spj'])) {
                $oldFileSPJ = ROOTPATH . 'public/uploads/spj/' . $verifikasi['file_spj'];
                if (file_exists($oldFileSPJ)) {
                    unlink($oldFileSPJ);
                }
            }

            // Pindahkan file SPJ baru ke direktori penyimpanan yang diinginkan
            $fileSPJ->move(ROOTPATH . 'public/uploads/spj');
            $fileSPJName = $fileSPJ->getName();
        } else {
            // Jika tidak ada file SPJ yang diunggah, gunakan file SPJ yang sudah ada
            $fileSPJName = $verifikasi['file_spj'];
        }

        // Simpan file kwitansi baru jika diunggah
        $fileKwitansi = $this->request->getFile('file_kwitansi');
        if ($fileKwitansi->isValid()) {
            // Hapus file kwitansi lama jika sudah ada
            if (!empty($verifikasi['file_kwitansi'])) {
                $oldFileKwitansi = ROOTPATH . 'public/uploads/kwitansi/' . $verifikasi['file_kwitansi'];
                if (file_exists($oldFileKwitansi)) {
                    unlink($oldFileKwitansi);
                }
            }

            // Pindahkan file kwitansi baru ke direktori penyimpanan yang diinginkan
            $fileKwitansi->move(ROOTPATH . 'public/uploads/kwitansi');
            $fileKwitansiName = $fileKwitansi->getName();
        } else {
            // Jika tidak ada file kwitansi yang diunggah, gunakan file kwitansi yang sudah ada
            $fileKwitansiName = $verifikasi['file_kwitansi'];
        }

        // Buat array data untuk disimpan
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
            'file_spj' => $fileSPJName,
            'file_kwitansi' => $fileKwitansiName,
            // 'status_bendahara' => $this->request->getPost('status_bendahara'),
            // 'status_kasubbag' => $this->request->getPost('status_kasubbag'),
            // 'status_pptik' => $this->request->getPost('status_pptik'),
            // 'status_verifikator_keuangan' => $this->request->getPost('status_verifikator_keuangan'),
        ];

        // Update data verifikasi
        $this->VerifikasiModel->update($id, $data);

        return redirect()->to('/verifikasi');
    }

    public function destroy($id)
    {
        $this->VerifikasiModel->delete($id);

        return redirect()->to('/verifikasi');
    }

    public function preview_spj($filename)
{
        $data['filename'] = $filename;
    return view('verifikasi/preview_spj', $data);
}

    public function preview_kwintansi($filename)
    {
        $data['filename'] = $filename;
        return view('verifikasi/preview_kwintansi', $data);
    }


public function download($id)
{
    $data = $this->VerifikasiModel->find($id);
    return $this->response->download(ROOTPATH . 'public/uploads/spj/' . $data['file_spj'], null);
}

   
public function terima($id)
{
    $model = new VerifikasiModel();
    $updated = $model->updateStatusBendahara($id, 'DITERIMA');
    if ($updated) {
        // Pembaruan berhasil
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diterima']);
    } else {
        // Pembaruan gagal
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui status.']);
    }
}

public function tolak($id)
{
    $model = new VerifikasiModel();
    $updated = $model->updateStatusBendahara($id, 'DITOLAK');
    if ($updated) {
        // Pembaruan berhasil
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil ditolak']);
    } else {
        // Pembaruan gagal
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui status.']);
    }
}
}