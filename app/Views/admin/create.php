<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Pasien</title>
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .header-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
            margin-top: 10px;
        }

        .sub-header {
            text-align: center;
            font-size: 1.1rem;
            color: #6c757d;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo-container img {
            width: 80px;
            /* Sesuaikan ukuran logo */
            height: auto;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Header dengan Logo -->
        <div class="text-center mb-4">
            <div class="logo-container">
                <!-- Ganti 'logo.png' dengan URL atau path ke file logo -->
                <div class="image">
                    <img src="<?= base_url('dist/img/bidan.png'); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <h1 class="header-title">KLINIK BIDAN SYIFA</h1>
            </div>
        </div>

        <!-- Card -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir Pendaftaran Pasien Baru</h3>
            </div>


            <!-- Form Start -->
            <form action="<?= base_url('/AdminController/store') ?> " method="post">
                <div class="card-body">
                    <!-- ID Pasien -->
                    <div class="form-group row">
                        <label for="id_pasien" class="col-sm-3 col-form-label">ID Pasien</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_pasien" class="form-control" id="id_pasien" placeholder="Masukkan ID pasien" required>
                        </div>
                    </div>

                    <!-- Nama Pasien -->
                    <div class="form-group row">
                        <label for="nm_pasien" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="nm_pasien" class="form-control" id="nm_pasien" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-check-input" id="Laki-Laki" required>
                                <label class="form-check-label" for="Laki-Laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input" id="Perempuan">
                                <label class="form-check-label" for="Perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                        </div>
                    </div>

                    <!-- ID User -->
                    <div class="form-group row">
                        <label for="id_user" class="col-sm-3 col-form-label">ID Dokter</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_user" class="form-control" id="id_user" placeholder="Masukkan ID Dokter" required>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                    </div>

                    <!-- Keluhan -->
                    <div class="form-group row">
                        <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-9">
                            <input type="text" name="keluhan" class="form-control" id="keluhan" placeholder="Masukkan keluhan" required>
                        </div>
                    </div>

                    <!-- Penanggung -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Penanggung</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="penanggung" value="BPJS" class="form-check-input" id="BPJS" required>
                                <label class="form-check-label" for="BPJS">BPJS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="penanggung" value="Jampersal" class="form-check-input" id="Jampersal">
                                <label class="form-check-label" for="Jampersal">Jampersal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="penanggung" value="Umum" class="form-check-input" id="Umum">
                                <label class="form-check-label" for="Umum">Umum</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Simpan</button>
                    <a href="<?= base_url('/AdminController/home') ?>" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Kembali
                    </a>

                </div>
            </form>
        </div>
    </div>

    <!-- AdminLTE Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>