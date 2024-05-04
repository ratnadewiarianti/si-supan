<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class KaryawanController extends BaseController
{
    protected $karyawanModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('karyawan/index', $data);
    }

    public function create()
    {
        return view('karyawan/create');
    }

    public function store()
    {
        // Validasi data
        $validationRules = [
            'jabatan' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'kategori_pegawai' => 'required',
            'norek' => 'required',
            'file' => 'uploaded[file]|mime_in[file,image/jpeg,image/png]|max_size[file,1024]',
            'status_ttd' => 'required',
            'keterangan' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman create dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Ambil file yang diunggah
        $file = $this->request->getFile('file');
    
        // Generate nama unik untuk file
        $namaFile = $file->getRandomName();
    
        // Pindahkan file ke folder yang diinginkan
        $file->move(ROOTPATH . 'public/uploads/ttd', $namaFile);
    
        // Data untuk disimpan ke database
        $data = [
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'kategori_pegawai' => $this->request->getPost('kategori_pegawai'),
            'norek' => $this->request->getPost('norek'),
            'file' => $namaFile,
            'status_ttd' => $this->request->getPost('status_ttd'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
    
        // Simpan data ke database
        $this->karyawanModel->insert($data);
    
        // Redirect ke halaman karyawan setelah berhasil disimpan
        return redirect()->to('/karyawan');
    }
    

    public function show($id)
    {
        $data['karyawan'] = $this->karyawanModel->find($id);
        return view('karyawan/show', $data);
    }

    public function edit($id)
    {
        $data['karyawan'] = $this->karyawanModel->find($id);
        return view('karyawan/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'kategori_pegawai' => $this->request->getPost('kategori_pegawai'),
        ];

        $this->karyawanModel->update($id, $data);

        return redirect()->to('/karyawan');
    }

    public function delete($id)
    {
        $this->karyawanModel->delete($id);

        return redirect()->to('/karyawan');
    }
}
