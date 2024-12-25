<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidanModel;
use App\Models\ObatModel;

class BidanController extends BaseController
{
    protected $BidanModel;
    protected $obatModel;

    public function __construct()
    {
        $this->BidanModel = new BidanModel();
        $this->obatModel = new ObatModel();
    }

    // Menampilkan daftar pasien
    public function index()
    {
        $data['pasien'] = $this->BidanModel->setTablePasien()->getAll('tgl_daftar');
        return view('bidan/index', $data);
    }

    // Menampilkan daftar riwayat kesehatan
    public function home()
    {
        $data['riwayat'] = $this->BidanModel->setTableRiwayat()->getAll();
        $data['pasien'] = $this->BidanModel->setTablePasien()->getAll(); // Sesuaikan dengan kebutuhan
        return view('bidan/rekam', $data);
    }

    // Menampilkan form pemeriksaan
    public function create($idPasien)
    {
        // Ambil data pasien berdasarkan ID
        $pasien = $this->BidanModel->setTablePasien()->where('id_pasien', $idPasien)->first();

        // Pastikan pasien ditemukan
        if (!$pasien) {
            return redirect()->back()->with('error', 'Data pasien tidak ditemukan.');
        }

        // Tambahkan data default untuk form pemeriksaan
        $data['pasien'] = [
            'tgl_daftar' => date('Y-m-d'), // Tanggal otomatis hari ini
            'id_pasien' => $pasien['id_pasien'], // ID pasien
            // 'no_antrian' => $pasien['no_antrian'], // ID pasien
            'nm_pasien' => $pasien['nm_pasien'], // Nama pasien
            'keluhan' => $pasien['keluhan'] ?? '', // Keluhan pasien (default kosong jika tidak ada)
        ];

        return view('bidan/home', $data);
    }

    // Menyimpan data pemeriksaan baru
    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $validation = $this->validate([
                'id_riwayat' => 'required',
                'id_pasien' => 'required',
                'nm_pasien' => 'required',
                'tgl_daftar' => 'required',
                'keluhan' => 'required',
                'diagnosa' => 'required',
                'tindakan' => 'required',
                'nm_obat' => 'required',
                'jumlah' => 'required',
                'keterangan' => 'required',
            ]);

            if (!$validation) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Persiapan data untuk disimpan
            $data = [
                'id_riwayat' => $this->request->getPost('id_riwayat'),
                'id_pasien' => $this->request->getPost('id_pasien'),
                'nm_pasien' => $this->request->getPost('nm_pasien'),
                'keluhan' => $this->request->getPost('keluhan'),
                'diagnosa' => $this->request->getPost('diagnosa'),
                'tindakan' => implode(', ', (array)$this->request->getPost('tindakan')),
                'tgl_daftar' => date('Y-m-d'),
                'id_obat' => $this->request->getPost('id_obat'),
                'nm_obat' => $this->request->getPost('nm_obat'),
                'jumlah' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            // Debug: Tampilkan data yang akan disimpan
            log_message('debug', 'Data yang akan disimpan: ' . print_r($data, true));

            // Coba untuk menyimpan data
            if ($this->BidanModel->setTableRiwayat()->insert($data)) {
                // Debug: Tampilkan pesan sukses jika penyimpanan berhasil
                log_message('debug', 'Data berhasil disimpan.');
                return redirect()->to('/bidan/rekam')->with('success', 'Data pemeriksaan berhasil disimpan.');
            } else {
                // Debug: Tampilkan pesan kesalahan jika penyimpanan gagal
                log_message('error', 'Gagal menyimpan data: ' . print_r($this->BidanModel->errors(), true));
                return redirect()->back()->with('error', 'Gagal menyimpan data pemeriksaan.');
            }
    }

    public function logout()
    {
        // Hapus semua data sesi
        session()->destroy();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/admin/home')->with('sukses', 'Anda berhasil logout.');
    }
}
