<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | KLINIK BIDAN SYIFA</title>
  <link rel="stylesheet" href="/assets/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    /* Background styling */
    body {
      background: linear-gradient(135deg, #6dd5ed, #2193b0);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Source Sans Pro', sans-serif;
      margin: 0;
    }

    .register-box {
      width: 420px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .logo-container {
      text-align: center;
      background: linear-gradient(135deg, #2193b0, #6dd5ed);
      padding: 20px;
      border-bottom-left-radius: 50% 20px;
      border-bottom-right-radius: 50% 20px;
      color: #ffffff;
    }

    .logo-container img {
      width: 90px;
      height: auto;
      border-radius: 50%;
      border: 4px solid #ffffff;
    }

    .header-title {
      margin-top: 10px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .card-body {
      padding: 30px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 30px;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .input-group-text {
      background: #2193b0;
      color: #fff;
      border-radius: 30px;
    }

    .btn-primary {
      background: #2193b0;
      border: none;
      border-radius: 30px;
      padding: 10px 20px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: #176387;
      transform: translateY(-3px);
    }

    .btn-danger {
      background: #e74c3c;
      border: none;
      border-radius: 30px;
      padding: 10px 20px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .btn-danger:hover {
      background: #c0392b;
      transform: translateY(-3px);
    }

    .alert {
      margin-top: 10px;
      border-radius: 10px;
    }

    .form-group label {
      font-weight: bold;
      color: #555;
    }
  </style>
</head>

<body>
  <div class="register-box">
    <div class="card">
      <div class="logo-container">
        <img src="<?= base_url('dist/img/bidan.png'); ?>" alt="User Image">
        <h1 class="header-title">KLINIK BIDAN SYIFA</h1>
      </div>
      <div class="card-body">
        <!-- Alert Messages -->
        <?php if (session()->getFlashdata('sukses')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach (session()->get('errors') as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('/user/store') ?>" method="post">
          <div class="input-group">
            <input type="text" name="id_user" class="form-control" placeholder="ID User" required>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
          </div>
          <div class="input-group">
            <input type="text" name="nm_user" class="form-control" placeholder="Nama User" required>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
            </div>
          </div>
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="role">Sebagai:</label>
            <select name="role" id="role" class="form-control" required>
              <option value="admin">Admin</option>
              <option value="bidan">Bidan</option>
              <option value="apoteker">Apoteker</option>
            </select>
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Daftar</button>
            <a href="<?= base_url('/user/logout') ?>" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
