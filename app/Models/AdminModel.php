<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'pasien'; // Nama tabel di database
    protected $primaryKey = 'id_pasien'; // Primary key tabel
    protected $allowedFields = [
        'id_pasien', 'nm_pasien', 'jenis_kelamin', 'tgl_lahir', 
        'id_user', 'alamat', 'tgl_daftar', 'keluhan', 'penanggung'
    ]; // Kolom yang diizinkan untuk diisi

    public function getAll()
    {
        return $this->orderBy('tgl_daftar', 'DESC')->findAll(); // Data diurutkan berdasarkan tanggal pendaftaran
    }

    public function getById($id)
    {
        return $this->find($id);
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
