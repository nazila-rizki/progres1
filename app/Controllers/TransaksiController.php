<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\BidanModel;
use App\Models\AdminModel;
use App\Models\RiwayatkesehatanModel;


class TransaksiController extends BaseController
{
    protected $transaksiModel;
    protected $bidanModel;
    protected $AdminModel;
    protected $RiwayatKesehatan;
    
    public function __construct()
    {
        // Inisialisasi model transaksi
        $this->transaksiModel = new TransaksiModel();
    }

    // **Menampilkan Daftar Transaksi**
    public function index()
    {
        // Ambil semua data transaksi dari database
        $data['transaksi'] = $this->transaksiModel->findAll();
        return view('transaksi/index', $data);
    }

    // **Menampilkan Form Tambah Transaksi**
    public function create()
    {
        return view('transaksi/create');
    }

    // **Menyimpan Data Transaksi Baru**
    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi data
            $validation = $this->validate([
                'no_antrian' => 'required',
                'id_pembayaran' => 'required',
                'id_pasien' => 'required',
                'nm_pasien' => 'required',
                'nm_user' => 'required',
                'status' => 'required|in_list[belum_dibayar,sudah_dibayar]',
            ]);

            if (!$validation) {
                // Kembali ke form dengan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Mengambil data dari form
            $data = [
                'id_pasien' => $this->request->getPost('id_pasien'),
                'nm_pasien' => $this->request->getPost('nm_pasien'),
                'nm_user' => $this->request->getPost('nm_user'),
                'id_pembayaran' => $this->request->getPost('id_pembayaran'),
                'no_antrian' => $this->request->getPost('no_antrian'),
                'status' => $this->request->getPost('status'),
            ];

            log_message('debug', 'Data yang dikirim: ' . json_encode($data));
            
            // Menyimpan data transaksi ke dalam database
            if ($this->transaksiModel->insert($data)) {
                return redirect()->to('/TransaksiController/index')->with('eror', 'Data tidak berhasil disimpan.');
            } else {
                return redirect()->to('/TransaksiController/index')->with('success', 'Data berhasil disimpan.');
            }
        }
    }

    public function bayar($id_pembayaran)
    {
        // Proses bayar
        // ...
    
        // Ambil id_pasien dari database
        $transaksiModel = new TransaksiModel();
        $data = $transaksiModel->find($id_pembayaran);
        $id_pasien = $data['id_pasien'];
    
        // Redirect ke halaman rekam menggunakan id_pasien
        return redirect()->to(base_url('BidanController/home/' . $id_pasien));
    }
   
    
}