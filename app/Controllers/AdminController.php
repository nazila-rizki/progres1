<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Dompdf\Dompdf;
use Dompdf\Options;


class AdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar pasien
    public function index()
    {
        return view('/admin/index');
    }

    public function home()
    {
        $data['pasien'] = $this->adminModel->getAll(); // Pastikan method getAll() di model berjalan
        return view('/admin/home', $data);
    }

    // Menampilkan form tambah pasien
    public function create()
    {
        return view('/admin/create');
    }

    // Menyimpan data pasien baru
    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi data
            $validation = $this->validate([
                'id_pasien' => 'required',
                'nm_pasien' => 'required|alpha_space',
                'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
                'tgl_lahir' => 'required|valid_date',
                'id_user' => 'required',
                'alamat' => 'required|min_length[5]',
                'keluhan' => 'required|min_length[3]',
                'penanggung' => 'required|in_list[BPJS,Jampersal,Umum]',
            ]);

            if (!$validation) {
                // Kembali ke form dengan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Mengambil data dari form
            $data = [
                'id_pasien' => $this->request->getPost('id_pasien'),
                'nm_pasien' => $this->request->getPost('nm_pasien'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'id_user' => $this->request->getPost('id_user'),
                'alamat' => $this->request->getPost('alamat'),
                'keluhan' => $this->request->getPost('keluhan'),
                'penanggung' => $this->request->getPost('penanggung'),
                'tgl_daftar' => date('Y-m-d H:i:s'), // Otomatis isi dengan tanggal dan waktu saat ini

            ];

            log_message('debug', 'Data yang dikirim: ' . json_encode($data));


            // Menyimpan data pasien ke dalam database
            if ($this->adminModel->insert($data)) {
                return redirect()->to('/AdminController/home')->with('success', 'Data berhasil disimpan.');
            } else {
                return redirect()->to('/AdminController/home')->with('error', 'Data berhasil di simpan.');
            }
        }
    }
    // Menampilkan form untuk mengedit data pasien
    public function edit($id)
    {
        $data['pasien'] = $this->adminModel->getById($id);

        if ($data['pasien']) {
            return view('/admin/edit', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
    }


    // Memperbarui data pasien
    public function update()
    {
        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id_pasien');
            $data = [
                'nm_pasien' => $this->request->getPost('nm_pasien'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'id_user' => $this->request->getPost('id_user'),
                'alamat' => $this->request->getPost('alamat'),
                'keluhan' => $this->request->getPost('keluhan'),
                'penanggung' => $this->request->getPost('penanggung'),
            ];

            if ($this->adminModel->updateRecord($id, $data)) {
                return redirect()->to('/AdminController/home')->with('success', 'Data berhasil diperbarui.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
            }
        }
    }

    // Menghapus data pasien
    public function delete($id)
    {
        if ($this->adminModel->deleteRecord($id)) {
            session()->setFlashdata('success', 'Data pasien berhasil dihapus.');
        } else {
            // Flashdata untuk pesan error
            session()->setFlashdata('error', 'Gagal menghapus data pasien.');
        }

        return redirect()->to('/AdminController/home');
    }

    public function print()
    {
        $pasien = $this->adminModel->findAll(); // Ambil semua data pasien
        return view('/admin/print', ['pasien' => $pasien]);
    }

    public function report()
    {
        return view('admin/laporan');
    }

    public function generatePdfReport()
    {
        // Ambil data pasien dari model
        $data['pasien'] = $this->adminModel->findAll();
    
        // Load view laporan
        $html = view('admin/laporan', $data);
    
        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Untuk memuat gambar eksternal
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Ukuran kertas dan orientasi
        $dompdf->render();
    
        // Output file PDF
        $dompdf->stream("Laporan_Data_Pasien.pdf", ["Attachment" => false]);
    }
    




    public function logout()
    {
        // Hapus semua data sesi
        session()->destroy();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/admin/home')->with('sukses', 'Anda berhasil logout.');
    }
}
