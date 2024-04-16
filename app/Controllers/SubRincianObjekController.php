<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RincianObjekModel;
use App\Models\SubRincianObjekModel;
class SubRincianObjekController extends BaseController
{
    protected $SubRincianObjekModel;
    protected $RincianObjekModel;
    public function __construct()
    {
        $this->SubRincianObjekModel = new SubRincianObjekModel();
        $this->RincianObjekModel = new RincianObjekModel();
    }

    public function index()
    {
        $data['subrincian'] = $this->SubRincianObjekModel
            ->select('sub_rincian_objek.*,rincian_objek.kode_rincian_objek')
            ->join('rincian_objek', 'rincian_objek.id = sub_rincian_objek.id_rincian_objek')
            ->findAll();
        return view('subrincian/index', $data);
    }

    public function create()
    {
        $data['rincianobjek'] = $this->RincianObjekModel->findAll();
        return view('subrincian/create', $data);
    }

    public function store()
    {
        $data = [
            'id_rincian_objek' => $this->request->getPost('id_rincian_objek'),
            'kode_sub_rincian_objek' => $this->request->getPost('kode_sub_rincian_objek'),
            'uraian_sub_rincian_objek' => $this->request->getPost('uraian_sub_rincian_objek'),
        ];

        $this->SubRincianObjekModel->insert($data);

        return redirect()->to('/subrincian');
    }


    public function edit($id)
    {
        $data = [
            'subrincian' => $this->SubRincianObjekModel->find($id),
            'rincianobjek' => $this->RincianObjekModel->findAll()
        ];
        return view('subrincian/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_rincian_objek' => $this->request->getPost('id_rincian_objek'),
            'kode_sub_rincian_objek' => $this->request->getPost('kode_sub_rincian_objek'),
            'uraian_sub_rincian_objek' => $this->request->getPost('uraian_sub_rincian_objek'),
        ];

        $this->SubRincianObjekModel->update($id, $data);

        return redirect()->to('subrincian');
    }

    public function destroy($id)
    {
        $this->SubRincianObjekModel->delete($id);

        return redirect()->to('/subrincian');
    }
}
