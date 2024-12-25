<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key tabel
    protected $allowedFields = ['id_user','nm_user', 'password', 'role']; // Kolom yang dapat diisi
    protected $useTimestamps = false; // Jika menggunakan kolom created_at dan updated_at
}
