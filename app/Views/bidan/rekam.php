<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pembayaran Pasien</title>
  <!-- Tambahkan CSS AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-center">Form Pembayaran Pasien Yoga</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="no_antrian" class="form-label">No Antrian</label>
                    <input type="text" class="form-control" id="no_antrian" name="no_antrian" required>
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label for="tgl_daftar" class="form-label">Tanggal Berobat</label>
                    <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar"
                      value="<?= isset($pasien['tgl_daftar']) ? $pasien['tgl_daftar'] : '' ?>" readonly>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="id_pasien" class="form-label">ID Pasien</label>
                    <input type="text" class="form-control" id="id_pasien" name="id_pasien"
                      value="<?= isset($pasien['id_pasien']) ? $pasien['id_pasien'] : '' ?>" readonly>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="nm_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="nm_pasien" name="nm_pasien"
                      value="<?= isset($pasien['nm_pasien']) ? $pasien['nm_pasien'] : '' ?>" readonly>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label for="diagnosa">Diagnosa</label>
                  <textarea class="form-control" id="diagnosa" rows="" readonly>Flu</textarea>
                </div>
              </form>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Bidan</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Hasil</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $grandTotal = 0; // Inisialisasi variabel grand total
                  ?>
                  <?php $no = 1; ?>
                  <?php if (!empty($riwayat)): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $riwayat['nm_user'] ?></td>
                      <td><?= $obat['nm_obat'] ?></td>
                      <td><?= $riwayat['keterangan'] ?></td>
                      <td><?= $riwayat['jumlah'] ?></td>
                      <td><?= number_format($obat['harga'], 0, ',', '.') ?></td>
                      <td><?= number_format($riwayat['jumlah'] * $obat['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <?php
                    // Hitung grand total (jumlah * harga) dan tambahkan ke $grandTotal
                    $grandTotal += $riwayat['jumlah'] * $obat['harga'];
                    ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7">Data riwayat tidak ditemukan</td>
                    </tr>
                  <?php endif; ?>
                </tbody>

                <tfoot>
                  <tr>
                    <th colspan="6" class="text-right">Total</th>
                    <th>Rp. <?= number_format($grandTotal, 0, ',', '.') ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="form-group text-right">
              <a href="<?= base_url('/BidanController/generatePdfReport') ?>" class="btn btn-danger">
                <i class="far fa-circle nav-icon"></i>
                <p>Cetak Resep Obat</p>
              </a>
              <a href="#" class="btn btn-danger">Kembali</a>
              <a href="#" class="btn btn-success">Bayar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambahkan JS AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
