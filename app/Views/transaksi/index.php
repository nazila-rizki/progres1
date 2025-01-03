<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi Pasien</title>
    <link rel="stylesheet" href="/assets/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <img src="<?= base_url('dist/img/bidan.png'); ?>"
                alt="Logo Klinik"
                class="brand-image img-circle elevation-3"
                style="width: 50px; height: 50px; object-fit: cover;">
            <span class="brand-text font-weight-bold text-light"
                style="font-family: 'Source Sans Pro', sans-serif; font-size: 1.2rem;">
                Klinik Bidan Syifa
            </span>
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
                            <ul class="nav nav-treeview" style="display: none; transition: all 0.3s;">
                                <li class="nav-item">
                                    <a href="<?= base_url('/Transaksiontroller/index') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Pembayaran</p>
                                    </a>
                                </li>
                            </ul>
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
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pembayaran</li>
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
                            <h4 class="text-center mb-0 p-2">
                                <i class="fas fa-users"></i> Data Antrian Pasien
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
                            <a href="<?= base_url('/TransaksiController/create') ?>" class="btn btn-success mb-3">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">Antrian</th>
                                        <th style="width: 15%">ID Pasien</th>
                                        <th style="width: 30%">Nama Pasien</th>
                                        <th style="width: 20%">Bidan</th>
                                        <th style="width: 15%">Status</th>
                                        <th style="width: 15%">Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td><?= $t['no_antrian'] ?></td>
                                            <td><?= $t['id_pasien'] ?></td>
                                            <td><?= $t['nm_pasien'] ?></td>
                                            <td><?= $t['nm_user'] ?></td>
                                            <td><?= $t['status'] ?></td>
                                            <td>
                                                <a href="<?= base_url('BidanController/data_rekam/' . $t['id_pasien']) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-money-bill-alt"></i> Bayar
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    </div>
    </div>