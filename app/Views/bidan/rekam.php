<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Kesehatan Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .table-container {
            max-width: 900px;
            margin: 40px auto;
        }
        .btn-kembali {
            background-color: #f44336;
            color: white;
        }
        .btn-simpan {
            background-color: #4caf50;
            color: white;
        }
        .btn-simpan:hover {
            background-color: #45a049;
        }
        .table {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Form Data Kesehatan Pasien -->
    <div class="form-container">
        <div class="form-header">
            <h2>Form Data Kesehatan Pasien</h2>
        </div>
        <form action="/path-to-save" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tgl_berobat" class="form-label">Tanggal Berobat</label>
                    <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat" required>
                </div>
                <div class="col-md-6">
                    <label for="no_antrian" class="form-label">No Antrian</label>
                    <input type="text" class="form-control" id="no_antrian" name="no_antrian" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="id_pasien" class="form-label">ID Pasien</label>
                    <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="PXXXXXXX" readonly>
                </div>
                <div class="col-md-6">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="Yoga" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <textarea class="form-control" id="diagnosa" name="diagnosa" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="nama_obat" class="form-label">Nama Obat</label>
                    <select class="form-select" id="nama_obat" name="nama_obat" required>
                        <option value="" selected>Pilih Obat</option>
                        <option value="Paracetamol">Paracetamol</option>
                        <option value="Amoxicillin">Amoxicillin</option>
                        <option value="Vitamin C">Vitamin C</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" required>
                </div>
                <div class="col-md-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
            </div>
            <div class="mb-3">
                <label for="tindakan" class="form-label">Tindakan</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pemeriksaan" name="tindakan[]" value="Pemeriksaan">
                    <label class="form-check-label" for="pemeriksaan">Pemeriksaan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kb" name="tindakan[]" value="KB">
                    <label class="form-check-label" for="kb">KB</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="imunisasi" name="tindakan[]" value="Imunisasi">
                    <label class="form-check-label" for="imunisasi">Imunisasi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="massage" name="tindakan[]" value="Massage">
                    <label class="form-check-label" for="massage">Massage</label>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-kembali">Kembali</button>
                <button type="submit" class="btn btn-simpan">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Rekam Medis Pasien -->
    <div class="table-container">
        <h3 class="text-center">Rekam Medis Pasien</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Berobat</th>
                    <th>Bidan</th>
                    <th>Diagnosa</th>
                    <th>Proses</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2022-08-23</td>
                    <td>Siti Pajri STr.Keb</td>
                    <td>Flu</td>
                    <td><button class="btn btn-success btn-sm">Detail</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2022-08-20</td>
                    <td>Safinatul Janah A.M.Keb</td>
                    <td>Mag</td>
                    <td><button class="btn btn-warning btn-sm">Ubah</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
