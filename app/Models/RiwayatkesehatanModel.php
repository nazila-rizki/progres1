<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatkesehatanModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'riwayat_kesehatan';
	protected $primaryKey           = 'id_riwayat';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_riwayat','nm_user', 'id_pasien', 'nm_pasien', 'tgl_daftar', 'keluhan', 'nm_obat', 'jumlah', 'keterangan', 'id_obat', 'diagnosa', 'tindakan'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
