<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DPAModel;
use App\Models\DetailDPAModel;
use App\Models\SubkegiatanModel;
use App\Models\SubRincianObjekModel;

class DetailDPAController extends BaseController
{
    protected $DetailDPAModel;
    protected $DPAModel;
    protected $SubkegiatanModel;
    protected $SubRincianObjekModel;
    public function __construct()
    {
        $this->DetailDPAModel = new DetailDPAModel();
        $this->DPAModel = new DPAModel();
        $this->SubkegiatanModel = new SubkegiatanModel();
        $this->SubRincianObjekModel = new SubRincianObjekModel();
    }


    public function show($id)
    {
        $data = [
            // 'dpa' => $this->DPAModel->findDatabyId($id),
            'detaildpa' => $this->DetailDPAModel->where('id_dpa', $id)->getDetailDPA(),
        ];

        // $penatausahaans = $this->penatausahaanModel->getPenatausahaan2();
        return view('detaildpa/show', $data);
    }


    public function create($id)
    {
        $detaildpa = $this->DetailDPAModel->where('id_dpa', $id)->findAll();
        $rekening = $this->SubRincianObjekModel->getRekening();
        $subkegiatan = $this->SubkegiatanModel->getSubkegiatan();


       
        $data = [
            // 'dpa' => $this->DPAModel->findDatabyId($id),
            'detaildpa' => $detaildpa,
            'subkegiatan' => $subkegiatan,
            'rekening' => $rekening,
        ];

        return view('detaildpa/create', $data);
    }

    public function store()
    {
        $data = [
            'id_dpa' => $this->request->getPost('id_dpa'),
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_rekening' => $this->request->getPost('id_rekening'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $this->DetailDPAModel->insert($data);

        // Ambil kembali id rak belanja dari data yang disimpan
        $id_dpa = $data['id_dpa'];

        // Redirect kembali ke fungsi show dengan menyertakan id rak belanja
        return redirect()->to("/detaildpa/show/$id_dpa");
    }


    public function edit($id)
    {
        // Ambil detail rak belanja berdasarkan ID
        $detaildpa = $this->DetailDPAModel->find($id);

        // Ambil ID rak belanja dari detail rak belanja
        $id_dpa = $detaildpa['id_dpa'];

        // Ambil semua bulan yang sudah terpilih untuk ID rak belanja kecuali bulan pada data yang dipilih
        $detaildpa = $this->DetailDPAModel
            ->where('id_dpa', $id_dpa)
            ->where('id !=', $id)
            ->findAll();

        $data = [
            'dpa' => $this->DPAModel->find($id_dpa),
            'detaildpa' => $detaildpa,
            // 'bulan_options' => $options
        ];

        return view('detaildpa/edit', $data);
    }




    public function update($id)
    {
        $data = [
            // 'bulan' => $this->request->getPost('bulan'),
            'id_dpa' => $this->request->getPost('id_dpa'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];


        $this->DetailDPAModel->update($id, $data);
        $id_dpa = $data['id_dpa'];

        // Redirect kembali ke fungsi show dengan menyertakan id rak belanja
        return redirect()->to("/detaildpa/show/$id_dpa");
    }



    public function destroy($id)
    {
        // Ambil detail rak belanja berdasarkan ID yang akan dihapus
        $detaildpa = $this->DetailDPAModel->find($id);

        // Simpan id_rakbelanja sebelum melakukan delete
        $id_dpa = $detaildpa['id_dpa'];

        // Lakukan penghapusan
        $this->DetailDPAModel->delete($id);

        // Redirect kembali ke halaman show dengan id_rakbelanja
        return redirect()->to("/detaildpa/show/$id_dpa");
    }


    public function edit_jumlah_perubahan($id)
    {
        // Ambil detail rak belanja berdasarkan ID
        $detaildpa = $this->DetailDPAModel->find($id);

        // Ambil ID rak belanja dari detail rak belanja
        $id_dpa = $detaildpa['id_dpa'];

        // Ambil semua bulan yang sudah terpilih untuk ID rak belanja kecuali bulan pada data yang dipilih
        $detaildpa = $this->DetailDPAModel
            ->where('id_dpa', $id_dpa)
            ->where('id !=', $id)
            ->findAll();

        $data = [
            'dpa' => $this->DPAModel->find($id_dpa),
            'detaildpa' => $detaildpa,
            // 'bulan_options' => $options
        ];

        return view('detaildpa/jumlah_perubahan', $data);
    }




    public function update_jumlah_perubahan($id)
    {
        $data = [
            // 'bulan' => $this->request->getPost('bulan'),
            'id_dpa' => $this->request->getPost('id_dpa'),
            'jumlah_perubahan' => $this->request->getPost('jumlah_perubahan'),
        ];


        $this->DetailDPAModel->update($id, $data);
        $id_dpa = $data['id_dpa'];

        // Redirect kembali ke fungsi show dengan menyertakan id rak belanja
        return redirect()->to("/detaildpa/show/$id_dpa");
    }



}
