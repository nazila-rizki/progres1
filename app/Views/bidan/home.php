<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Data Kesehatan Pasien</title>
  <link rel="stylesheet" href="/assets/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="bg-light">

  <!-- Form Data Kesehatan Pasien -->
  <div class="container my-3">
    <div class="card mx-auto shadow" style="max-width: 600px;">
      <div class="card-header text-center">
        <h3 class="text-center mb-4">Form Data Kesehatan Pasien</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('BidanController/store') ?>" method="post">
          <div class="mb-3">
            <label for="id_riwayat" class="form-label">Id Riwayat</label>
            <input type="text" class="form-control" id="no_antrian" name="id_riwayat" required>
          </div>

          <!-- Tanggal Berobat -->
          <div class="mb-3">
            <label for="tgl_daftar" class="form-label">Tanggal Berobat</label>
            <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar"
              value="<?= isset($pasien['tgl_daftar']) ? $pasien['tgl_daftar'] : '' ?>" readonly>
          </div>

          <!-- Nomor Antrian -->
          <div class="mb-3">
            <label for="no_antrian" class="form-label">No Antrian</label>
            <input type="text" class="form-control" id="no_antrian" name="no_antrian" required>
          </div>

          <!-- ID Pasien -->
          <div class="mb-3">
            <label for="id_pasien" class="form-label">ID Pasien</label>
            <input type="text" class="form-control" id="id_pasien" name="id_pasien"
              value="<?= isset($pasien['id_pasien']) ? $pasien['id_pasien'] : '' ?>" readonly>
          </div>

          <!-- Nama Pasien -->
          <div class="mb-3">
            <label for="nm_pasien" class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" id="nm_pasien" name="nm_pasien"
              value="<?= isset($pasien['nm_pasien']) ? $pasien['nm_pasien'] : '' ?>" readonly>
          </div>

          <!-- Keluhan -->
          <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan" readonly>
            <?= isset($pasien['keluhan']) ? htmlspecialchars($pasien['keluhan']) : '' ?>
          </textarea>
          </div>

          <!-- Diagnosa -->
          <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea class="form-control" id="diagnosa" name="diagnosa" required></textarea>
          </div>

          <div class="mb-3">
            <label for="id_obat" class="form-label">Id Obat</label>
            <input type="text" class="form-control" id="id_obat" name="id_obat" required>
          </div>

          <!-- Obat -->
          <h4 class="mb-4">Obat</h4>
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="nm_obat" class="form-label">Nama Obat</label>
              <select class="form-select" id="nm_obat" name="nm_obat" required>
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

          <!-- Tindakan -->
          <h4 class="mb-3">Tindakan</h4>
          <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="persalinan" name="tindakan[]" value="persalinan">
              <label class="form-check-label" for="persalinan">Persalinan</label>
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
              <input class="form-check-input" type="checkbox" id="khitan" name="tindakan[]" value="khitan">
              <label class="form-check-label" for="kb">Khitan</label>
            </div>
            <div class="d-flex flex-wrap mb-3">
            <div class="form-check me-3">
              <input class="form-check-input" type="checkbox" id="massage" name="tindakan[]" value="Massage">
              <label class="form-check-label" for="massage">Massage</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terapi_ruqyah" name="tindakan[]" value="terapi_ruqyah">
              <label class="form-check-label" for="terapi_ruqyah">Terapi Ruqyah</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terapi_herbal" name="tindakan[]" value="terapi_herbal">
              <label class="form-check-label" for="terapi_herbal">Terapi Herbal</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="USG" name="tindakan[]" value="USG">
              <label class="form-check-label" for="USG">USG</label>
            </div>
      </div>
      </div>
      </div>

      <!-- Buttons -->
      <div class="d-flex justify-content-between mt-4">
        <a href="#" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>