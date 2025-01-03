<?php
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'pembayaran'; // Nama tabel
    protected $primaryKey = 'id_pembayaran'; // Primary key tabel
    protected $allowedFields = ['id_pasien','id_pembayaran', 'no_antrian', 'nm_pasien', 'nm_user', 'status']; // Kolom yang boleh diisi

    // Simpan transaksi baru
    public function simpanTransaksi($data)
    {
        return $this->insert($data); // Insert data ke tabel
    }

    // Ambil transaksi berdasarkan ID pasien
    public function getTransaksiByPasien($id_pasien)
    {
        return $this->where('id_pasien', $id_pasien)->findAll(); // Ambil semua data berdasarkan id_pasien
    }
}
?>