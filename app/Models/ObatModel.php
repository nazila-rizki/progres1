<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $allowedFields = ['id_obat', 'nm_obat', 'kategori', 'harga', 'stok'];


    public function edit($id_obat)
    {
        return $this->where('id_obat', $id_obat)->first();
    }
}
