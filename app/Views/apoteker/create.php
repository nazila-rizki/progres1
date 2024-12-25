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
                <h3 class="card-title">Formulir tambah obat</h3>
            </div>


            <!-- Form Start -->
            <form action="<?= base_url('/ObatController/store') ?> " method="post">
                <div class="card-body">
                    <!-- ID Pasien -->
                    <div class="form-group row">
                        <label for="id_obat" class="col-sm-3 col-form-label">ID Obat</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_obat" class="form-control" id="id_obat" placeholder="Masukkan ID Obat" required>
                        </div>
                    </div>

                    <!-- Nama Pasien -->
                    <div class="form-group row">
                        <label for="nm_obat" class="col-sm-3 col-form-label">Nama Obat</label>
                        <div class="col-sm-9">
                            <input type="text" name="nm_obat" class="form-control" id="nm_obat" placeholder="Masukkan nama obat" required>
                        </div>
                    </div>

                    <!-- kategori -->
                    <div class="form-group row">
                        <label for="kotegori" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" name="kategori" class="form-control" id="kategori" placeholder="kategori" required>
                        </div>
                    </div>

                    <!-- harga -->
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan nama obat" required>
                        </div>
                    </div>

                    <!-- stok -->
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                        <div class="col-sm-9">
                            <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok" required>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Simpan</button>
                        <a href="<?= base_url('/ObatController/index') ?>" class="btn btn-secondary">
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