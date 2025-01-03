<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidanModel;
use App\Models\ObatModel;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\RiwayatkesehatanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class BidanController extends BaseController
{
    protected $BidanModel;
    protected $obatModel;
    protected $UserModel;
    protected $AdminModel;
    protected $RiwayatKesehatan;

    public function __construct()
    {
        $this->BidanModel = new BidanModel();
        $this->obatModel = new ObatModel();
        $this->AdminModel = new AdminModel();
        $this->RiwayatKesehatan = new RiwayatkesehatanModel();
        $this->UserModel = new UserModel();
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

        $this->RiwayatKesehatan->insert([
            'id_riwayat' => $this->request->getVar('id_riwayat'),
            'nm_user' => $this->request->getVar('nm_user'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'nm_pasien' => $this->request->getVar('nm_pasien'),
            'keluhan' => $this->request->getVar('keluhan'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'tgl_daftar' => $this->request->getVar('tgl_daftar'),
            'id_obat' => $this->request->getVar('id_obat'),
            'nm_obat' => $this->request->getVar('nm_obat'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);


        $data = [
            'pasien' => $this->request->getVar(),
            'riwayat' => $this->BidanModel->setTableRiwayat()->where('id_riwayat', $this->request->getVar('id_riwayat'))->first(),
            'obat' => $this->obatModel->find($this->request->getVar('id_obat'))

        ];

        return view('bidan/rekam', $data);
    }

    public function data_rekam()
    {
        // Ambil semua data dari tabel riwayat kesehatan menggunakan model
        $riwayat = $this->RiwayatKesehatan->findAll();
    
        // Hitung grand total untuk jumlah obat
        $grandTotal = 0;
        foreach ($riwayat as $item) {
            $grandTotal += (int)($item['jumlah'] ?? 0); // Tambahkan jumlah obat, pastikan nilai numerik
        }
    
        // Siapkan data untuk dikirim ke view
        $data = [
            'riwayat' => $riwayat,
            'grandTotal' => $grandTotal,
        ];
    
        // Tampilkan data di view bidan/rekam
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
                'nm_user' => 'required',
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

            // Ambil data bidan (user) dari UserModel
            $bidan = $this->UserModel->where('role', 'bidan')->findAll();


            // Persiapan data untuk disimpan
            $data = [
                'id_riwayat' => $this->request->getPost('id_riwayat'),
                'nm_user' => $this->request->getPost('nm_user'),
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
            log_message('error', 'Error Database: ' . print_r($this->db->error(), true));


            // Coba untuk menyimpan data
            if ($this->BidanModel->setTableRiwayat()->insert($data)) {
                // Debug: Tampilkan pesan sukses jika penyimpanan berhasil
                log_message('debug', 'Data berhasil disimpan.');
                return redirect()->to('bidan/rekam')->with('success', 'Data pemeriksaan berhasil disimpan.');
            } else {
                // Debug: Tampilkan pesan kesalahan jika penyimpanan gagal
                log_message('error', 'Gagal menyimpan data: ' . print_r($this->BidanModel->errors(), true));
                return redirect()->back()->with('success', 'Data pemeriksaan berhasil disimpan.');
            }
        }
    }

    public function report()
    {
        return view('bidan/laporan');
    }

    public function generatePdfReport()
    {
        // Ambil data pasien dari model
        $data['riwayat'] = $this->BidanModel->findAll();

        // Load view laporan
        $html = view('bidan/laporan', $data);

        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Untuk memuat gambar eksternal
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Ukuran kertas dan orientasi
        $dompdf->render();

        // Output file PDF
        $dompdf->stream("Laporan_Data_Riwayat.pdf", ["Attachment" => false]);
    }

    public function logout()
    {
        // Hapus semua data sesi
        session()->destroy();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/bidan/index')->with('sukses', 'Anda berhasil logout.');
    }
}
