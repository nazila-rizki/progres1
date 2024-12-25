<?php

namespace App\Controllers;

use App\Models\ObatModel;
use Dompdf\Dompdf;
use Dompdf\Options;


class ObatController extends BaseController
{
    protected $obatModel;

    public function __construct()
    {
        $this->obatModel = new ObatModel();
    }

    // Menampilkan daftar obat
    public function index()
    {
        $data['obat'] = $this->obatModel->findAll();
        return view('apoteker/index', $data);
    }

    // Menampilkan form tambah obat
    public function create()
    {
        return view('apoteker/create');
    }

    // Validasi input obat
    private function validateObat()
    {
        return $this->validate([
            'id_obat' => 'required',
            'nm_obat' => 'required',
            'kategori' => 'required',
            'harga' => 'required|decimal|greater_than[0]',
            'stok' => 'required|integer',
        ]);
    }

    // Menyimpan data obat baru
    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            if (!$this->validateObat()) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->request->getPost(['id_obat', 'nm_obat', 'kategori', 'harga', 'stok']);

            if ($this->obatModel->insert($data)) {
                return redirect()->to(route_to('apoteker.index'))->with('error', 'Gagal menambahkan data obat.');
            } else {
                return redirect()->back()->withInput()->with('success', 'Data obat berhasil ditambahkan.');
            }
        }
    }
    
    // Menampilkan form edit obat
    public function edit($id = null)
    {
        // Pastikan `$id` diambil dari parameter, bukan POST
        if ($id === null) {
            return redirect()->to(route_to('apoteker.index'))->with('error', 'ID obat tidak ditemukan.');
        }

        // Temukan data obat berdasarkan ID
        $obat = $this->obatModel->getPost($id);

        if (!$obat) {
            return redirect()->to(route_to('apoteker.index'))->with('error', 'Data obat tidak ditemukan.');
        }

        // Kirim data obat ke view untuk ditampilkan
        $data['obat'] = [$obat];

        return view('apoteker/edit', $data);
    }

    // Memperbarui data obat
    public function update()
    {
        // Periksa metode permintaan
        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id_obat');

            // Pastikan ID valid
            if (!$id) {
                return redirect()->back()->withInput()->with('error', 'ID obat tidak ditemukan.');
            }

            // Validasi data yang dikirimkan
            if (!$this->validate([
                'id_obat'   =>'required',
                'nm_obat' => 'required',
                'kategori' => 'required',
                'harga' => 'required|decimal',
                'stok' => 'required|integer',
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Ambil data POST
            $data = $this->request->getPost(['id_obat', 'nm_obat', 'kategori', 'harga', 'stok']);

            // Simpan ke database
            if ($this->obatModel->update($id, $data)) {
                return redirect()->to('/apoteker/index')->with('success', 'Data obat berhasil diperbarui.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data obat.');
            }
        }

        // Jika metode bukan POST, kembalikan ke index
        return redirect()->to('/apoteker/index')->with('error', 'Permintaan tidak valid.');
    }


    public function generatePdfReport()
    {
        // Ambil data pasien dari model
        $data['obat'] = $this->obatModel->findAll();
    
        // Load view laporan
        $html = view('apoteker/laporan', $data);
    
        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Untuk memuat gambar eksternal
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Ukuran kertas dan orientasi
        $dompdf->render();
    
        // Output file PDF
        $dompdf->stream("Laporan_Data_Obat.pdf", ["Attachment" => false]);
    }
    

    // Menghapus data obat
    public function delete($id)
    {
        if ($this->obatModel->delete($id)) {
            session()->setFlashdata('success', 'Data obat berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data obat.');
        }

        return redirect()->to(route_to('apoteker.index'));
    }

    // Menambah stok obat
    public function addStock($id)
    {
        $data = $this->obatModel->find($id);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Obat tidak ditemukan.');
        }

        $jumlah = $this->request->getPost('jumlah');

        if (!is_numeric($jumlah) || $jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah stok harus berupa angka positif.');
        }

        $newStock = $data['stok'] + (int) $jumlah;

        if ($this->obatModel->update($id, ['stok' => $newStock])) {
            return redirect()->to(route_to('obat.index'))->with('success', 'Stok obat berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah stok obat.');
        }
    }

    // Mengurangi stok obat
    public function reduceStock($id)
    {
        $data = $this->obatModel->find($id);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Obat tidak ditemukan.');
        }

        $jumlah = $this->request->getPost('jumlah');

        if (!is_numeric($jumlah) || $jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah pengurangan stok harus berupa angka positif.');
        }

        if ($data['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk pengurangan.');
        }

        $newStock = $data['stok'] - (int) $jumlah;

        if ($this->obatModel->update($id, ['stok' => $newStock])) {
            return redirect()->to(route_to('obat.index'))->with('success', 'Stok obat berhasil dikurangi.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengurangi stok obat.');
        }
    }
}
