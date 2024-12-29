<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Data Pasien</title>
    <!-- Link CSS AdminLTE -->
    <link rel="stylesheet" href="/assets/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center">Laporan Pembayaran Pasien Yoga</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <!-- Header Laporan -->
                    <div class="header-report">
                        <h1>Klinik Bidan Syifa</h1>
                        <p>Tanggal Laporan: <?= date("d-m-Y") ?></p>
                        <p>No. Antrian: <?= isset($pasien['no_antrian']) ? $pasien['no_antrian'] : '' ?></p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_antrian" class="form-label">No Antrian</label>
                                        <input type="text" class="form-control" id="no_antrian" name="no_antrian" required readonly
                                            value="<?= isset($item['no_antrian']) ? $item['no_antrian'] : '' ?>">
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
                                    <textarea class="form-control" id="diagnosa" rows="4" readonly>Flu</textarea>
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
                                    $no = 1;
                                    ?>
                                    <?php if (!empty($riwayat)): ?>
                                        <?php foreach ($riwayat as $item): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $item['nm_user'] ?></td>
                                                <td><?= $item['nm_obat'] ?></td>
                                                <td><?= $item['keterangan'] ?></td>
                                                <td><?= $item['jumlah'] ?></td>
                                                <td><?= isset($item['harga']) && is_numeric($item['harga']) ? number_format($item['harga'], 0, ',', '.') : 'N/A' ?></td>
                                                <td><?= isset($item['jumlah'], $item['harga']) && is_numeric($item['jumlah']) && is_numeric($item['harga']) ? number_format($item['jumlah'] * $item['harga'], 0, ',', '.') : 'Data Tidak Lengkap' ?></td>
                                            </tr>
                                            <?php
                                            // Hitung grand total (jumlah * harga) dan tambahkan ke $grandTotal
                                            $grandTotal += $item['jumlah'] * $item['harga'];
                                            ?>
                                        <?php endforeach; ?>
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

                        <div style="text-align: right; font-family: 'Georgia', serif; margin-top: 50px;">
                            <p style="font-size: 18px; margin-bottom: 50px; color: #4b4b4b; letter-spacing: 1px;">
                                <strong>Bekasi, <?= date('d-F-Y') ?></strong>
                            </p>
                            <div style="margin-bottom: 100px; font-style: italic; font-size: 16px; color: #7a7a7a;">
                                Hormat Kami,<br>
                                <span style="font-size: 20px; font-weight: bold;">TTD</span>
                            </div>
                            <p style="font-size: 16px; font-weight: bold; margin-top: 0; border-top: 2px solid #000; width: 300px; text-align: center; margin-left: auto; padding-top: 10px;">
                                Siti Fajar STr.Keb
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
