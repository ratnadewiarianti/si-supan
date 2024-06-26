<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SubRincianObjekModel;
use App\Models\RakBelanjaModel;
class RakBelanjaController extends BaseController
{
    protected $SubRincianObjekModel;
    protected $RakBelanjaModel;
    public function __construct()
    {
        $this->SubRincianObjekModel = new SubRincianObjekModel();
        $this->RakBelanjaModel = new RakBelanjaModel();
    }

    public function index()
    {
        $data['rakbelanja'] = $this->RakBelanjaModel->findData();
        foreach ($data['rakbelanja'] as &$rak) {
            $totalRak = $this->RakBelanjaModel->getTotalRak($rak['id']);
            $rak['total_rak'] = $totalRak;
        }
        return view('rakbelanja/index', $data);
    }


    public function create()
    {
        $data['rekening'] = $this->SubRincianObjekModel->getRekening();
        return view('rakbelanja/create', $data);
    }

    public function store()
    {
        $data = [
            'nm_subkegiatan' => $this->request->getPost('nm_subkegiatan'),
            'id_rekening' => $this->request->getPost('id_rekening'),
            'nilai_rincian' => $this->request->getPost('nilai_rincian'),
        ];

        $this->RakBelanjaModel->insert($data);

        return redirect()->to('/rakbelanja');
    }


    public function edit($id)
    {
        $data = [
            'rakbelanja' => $this->RakBelanjaModel->find($id),
            'rekening' => $this->SubRincianObjekModel->getRekening()
        ];
        return view('rakbelanja/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nm_subkegiatan' => $this->request->getPost('nm_subkegiatan'),
            'id_rekening' => $this->request->getPost('id_rekening'),
            'nilai_rincian' => $this->request->getPost('nilai_rincian'),
        ];

        $this->RakBelanjaModel->update($id, $data);

        return redirect()->to('rakbelanja');
    }

    public function destroy($id)
    {
        $this->RakBelanjaModel->delete($id);

        return redirect()->to('/rakbelanja');
    }
}
