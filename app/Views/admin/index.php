<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Syifa Admin Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content-wrapper {
            margin-top: 20px;
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
        }

        .card-body ul li {
            padding: 0.5rem 0;
        }

        .card-body ul li a {
            color: white;
            text-decoration: none;
        }

        .card-body ul li a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .container {
            margin-top: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .card {
            margin-bottom: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .sidebar-dark-primary .nav-link {
            color: #fff;
        }

        .sidebar-dark-primary .nav-link:hover {
            background-color: #007bff;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
            <div class="col-sm-6">
            </div>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link"><i class="fas fa-user"></i> Admin</a>
            </div>
        </nav>

        <!-- Main Sidebar Container -->
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
                            <a href="#" class="nav-link" style="position: relative;">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none; transition: all 0.3s;">
                                <li class="nav-item">
                                    <a href="<?= base_url('/AdminController/generatePdfReport') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Data Pasien</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview" style="display: none; transition: all 0.3s;">
                                <li class="nav-item">
                                    <a href="<?= base_url('/ObatController/generatePdfReport') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Data Obat</p>
                                    </a>
                                </li>
                            </ul>
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
            <div class="container">
                <h3>Selamat Datang Di Klinik Bidan Syifa</h3>
            </div>
        </div>
    </div>

    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>