<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DPAModel;
class DPAController extends BaseController
{
    protected $DPAModel;
    public function __construct()
    {
        $this->DPAModel = new DPAModel();

    }

    public function index()
    {
        $data['dpa'] = $this->DPAModel->findAll();
        return view('dpa/index', $data);
    }

    public function create()
    {
        return view('dpa/create');
    }

    public function store()
    {
        $data = [
            'nomor_dpa' => $this->request->getPost('nomor_dpa'),
        ];

        $this->DPAModel->insert($data);

        return redirect()->to('/dpa');
    }


    public function edit($id)
    {
        $data = [
            'dpa' => $this->DPAModel->find($id),
        ];
        return view('dpa/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_dpa' => $this->request->getPost('nomor_dpa'),
        ];

        $this->DPAModel->update($id, $data);

        return redirect()->to('dpa');
    }

    public function destroy($id)
    {
        $this->DPAModel->delete($id);

        return redirect()->to('/dpa');
    }
}
