<?php

namespace App\Models;

use CodeIgniter\Model;

class BidanModel extends Model
{
    protected $table; // Tabel akan diatur dinamis
    protected $primaryKey;
    protected $allowedFields;

    // Konfigurasi tabel `pasien`
    public function setTablePasien()
    {
        $this->table = 'pasien';
        $this->primaryKey = 'id_pasien';
        $this->allowedFields = [
            'id_pasien', 'nm_pasien', 'jenis_kelamin', 'tgl_lahir',
            'alamat', 'tgl_daftar', 'keluhan', 'penanggung'
        ];
        return $this;
    }

    // Konfigurasi tabel `riwayat_kesehatan`
    public function setTableRiwayat()
    {
        $this->table = 'riwayat_kesehatan';
        $this->primaryKey = 'id_riwayat';
        $this->allowedFields = [
            'id_riwayat', 'id_pasien', 'id_obat', 'diagnosa', 'tindakan'
        ];
        return $this;
    }

    // Ambil semua data dengan urutan tertentu
    public function getAll($orderBy = null, $order = 'DESC')
    {
        if ($orderBy) {
            return $this->orderBy($orderBy, $order)->findAll();
        }
        return $this->findAll();
    }

    public function getById($idPasien)
    {
        return $this->where('id_pasien', $idPasien)->first();

    }

    public function updateRecord($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRecord($id)
    {
        return $this->delete($id);
    }
}
