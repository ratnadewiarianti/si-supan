<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RakBelanjaModel;
use App\Models\DetailRakBelanjaModel;

class DetailRakController extends BaseController
{
    protected $DetailRakBelanjaModel;
    protected $RakBelanjaModel;
    public function __construct()
    {
        $this->DetailRakBelanjaModel = new DetailRakBelanjaModel();
        $this->RakBelanjaModel = new RakBelanjaModel();
    }


    public function show($id)
    {
        $data = [
            'rakbelanja' => $this->RakBelanjaModel->findDatabyId($id),
            'detailrak' => $this->DetailRakBelanjaModel->where('id_rakbelanja', $id)->findAll(),
        ];
        foreach ($data['rakbelanja'] as &$rak) {
            $totalRak = $this->RakBelanjaModel->getTotalRak($rak['id']);
            $rak['total_rak'] = $totalRak;
        }
        return view('detailrak/show', $data);
    }


    public function create($id)
    {
        $detailrak = $this->DetailRakBelanjaModel->where('id_rakbelanja', $id)->findAll();
        $bulan_terpilih = array_column($detailrak, 'bulan');

        // Ambil semua bulan
        $all_bulan = [
            'Januari'   => 'Januari',
            'Februari'  => 'Februari',
            'Maret'     => 'Maret',
            'April'     => 'April',
            'Mei'       => 'Mei',
            'Juni'      => 'Juni',
            'Juli'      => 'Juli',
            'Agustus'   => 'Agustus',
            'September' => 'September',
            'Oktober'   => 'Oktober',
            'November'  => 'November',
            'Desember'  => 'Desember'
        ];

        // Buat opsi untuk dropdown bulan
        $options = '';
        foreach ($all_bulan as $key => $bulan) {
            $disabled = in_array($key, $bulan_terpilih) ? 'disabled' : ''; // Periksa apakah bulan sudah dipilih
            $options .= "<option value=\"$key\" $disabled>$bulan</option>";
        }

        $data = [
            'rakbelanja' => $this->RakBelanjaModel->findDatabyId($id),
            'detailrak' => $detailrak,
            'bulan_options' => $options
        ];

        return view('detailrak/create', $data);
    }

    public function store()
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'id_rakbelanja' => $this->request->getPost('id_rakbelanja'),
            'nilai' => $this->request->getPost('nilai'),
        ];

        $this->DetailRakBelanjaModel->insert($data);

        // Ambil kembali id rak belanja dari data yang disimpan
        $id_rakbelanja = $data['id_rakbelanja'];

        // Redirect kembali ke fungsi show dengan menyertakan id rak belanja
        return redirect()->to("/detailrak/show/$id_rakbelanja");
    }


    public function edit($id)
    {
        // Ambil detail rak belanja berdasarkan ID
        $detailrak = $this->DetailRakBelanjaModel->find($id);

        // Ambil ID rak belanja dari detail rak belanja
        $id_rakbelanja = $detailrak['id_rakbelanja'];

        // Ambil semua bulan yang sudah terpilih untuk ID rak belanja kecuali bulan pada data yang dipilih
        $detailrak_rakbelanja = $this->DetailRakBelanjaModel
            ->where('id_rakbelanja', $id_rakbelanja)
            ->where('id !=', $id)
            ->findAll();
        $bulan_terpilih = array_column($detailrak_rakbelanja, 'bulan');

        // Ambil semua bulan
        $all_bulan = [
            'Januari'   => 'Januari',
            'Februari'  => 'Februari',
            'Maret'     => 'Maret',
            'April'     => 'April',
            'Mei'       => 'Mei',
            'Juni'      => 'Juni',
            'Juli'      => 'Juli',
            'Agustus'   => 'Agustus',
            'September' => 'September',
            'Oktober'   => 'Oktober',
            'November'  => 'November',
            'Desember'  => 'Desember'
        ];

        // Buat opsi untuk dropdown bulan
        $options = '';
        foreach ($all_bulan as $key => $bulan) {
            // Tandai bulan yang sesuai dengan id_detail_rak sebagai selected
            $selected = ($key === $detailrak['bulan']) ? 'selected' : '';
            // Periksa apakah bulan sudah terpilih untuk ID rak belanja
            $disabled = in_array($key, $bulan_terpilih) && ($key !== $detailrak['bulan']) ? 'disabled' : '';
            $options .= "<option value=\"$key\" $disabled $selected>$bulan</option>";
        }

        $data = [
            'rakbelanja' => $this->RakBelanjaModel->find($id_rakbelanja),
            'detailrak' => $detailrak,
            'bulan_options' => $options
        ];

        return view('detailrak/edit', $data);
    }




    public function update($id)
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'id_rakbelanja' => $this->request->getPost('id_rakbelanja'),
            'nilai' => $this->request->getPost('nilai'),
        ];


        $this->DetailRakBelanjaModel->update($id, $data);
        $id_rakbelanja = $data['id_rakbelanja'];

        // Redirect kembali ke fungsi show dengan menyertakan id rak belanja
        return redirect()->to("/detailrak/show/$id_rakbelanja");
    }



    public function destroy($id)
    {
        // Ambil detail rak belanja berdasarkan ID yang akan dihapus
        $detailrak = $this->DetailRakBelanjaModel->find($id);

        // Simpan id_rakbelanja sebelum melakukan delete
        $id_rakbelanja = $detailrak['id_rakbelanja'];

        // Lakukan penghapusan
        $this->DetailRakBelanjaModel->delete($id);

        // Redirect kembali ke halaman show dengan id_rakbelanja
        return redirect()->to("/detailrak/show/$id_rakbelanja");
    }



}
