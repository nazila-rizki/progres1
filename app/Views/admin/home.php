<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Data Pasien</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background-color: #f4f6f9;
    }

    .table-hover tbody tr:hover {
      background-color: #f8f9fa;
    }

    .table th {
      background-color: #007bff;
      color: white;
      text-align: center;
    }

    .card-header {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Wrapper -->
  <div class="wrapper">
    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="Admin Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Klinik Syifa</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/admin/index" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <!-- Master Data -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('/AdminController/home') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pasien</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('/BidanController/index') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Bidan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('/ObatController/index') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Obat</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Transactions -->
            <li class="nav-item">
              <a href="/admin/transactions" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>Transactions</p>
              </a>
            </li>
            <!-- Reports -->
            <li class="nav-item">
              <a href="/admin/reports" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Reports</p>
              </a>
            </li>
            <a href="<?= base_url('/AdminController/logout') ?>" class="btn btn-danger d-flex align-items-center">
              <i class="fas fa-sign-out-alt me-2" style="font-size: 18px;"></i>
              <span>Keluar</span>
            </a>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pasien</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center mb-0"><i class="fas fa-users"></i> Data Antrian Pasien</h4>
            </div>
            <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>


            <div class="card-body">
              <a href="<?= base_url('/AdminController/create') ?>" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Tambah Data
              </a>
            
              <a href="<?= base_url('/AdminController/generatePdfReport') ?>" class="btn btn-danger mb-3">
                <i class="fas fa-file-pdf"></i> Unduh Laporan PDF
              </a>



              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No Antrian</th>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>Id Dokter</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Keluhan</th>
                    <th>Penanggung</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pasien as $key => $data): ?>
                    <tr>
                      <td class="text-center"><?= $key + 1 ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['id_pasien']) ?></td>
                      <td><?= htmlspecialchars($data['nm_pasien']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['tgl_lahir']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['id_user']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['alamat']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['tgl_daftar']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['keluhan']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($data['penanggung']) ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('/dokter/index/' . $data['id_pasien']) ?>"
                          class="btn btn-warning btn-sm">
                          <i class="fas fa-stethoscope"></i>Periksa
                        </a>

                        <a href="/AdminController/delete/<?= $data['id_pasien'] ?>" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i> Delete
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php if (empty($pasien)): ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>

</html>