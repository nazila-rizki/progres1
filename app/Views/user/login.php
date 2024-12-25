<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | KLINIK BIDAN SYIFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">

  <style>
    /* General styling for the background and layout */
    body {
      background: linear-gradient(135deg, #6dd5ed, #2193b0);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Source Sans Pro', sans-serif;
      margin: 0;
      margin-top: 100px;
    }

    .login-box {
      width: 500px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    .logo-container {
      text-align: center;
      /* background: linear-gradient(135deg, #2193b0, #6dd5ed); */
      padding: 20px;
      border-bottom-left-radius: 60% 20px;
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

    .alert {
      margin-top: 50px;
      border-radius: 50px;
    }

    .form-group label {
      font-weight: bold;
      color: #555;
    }

    .or-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0;
    }

    .or-container::before,
    .or-container::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #ccc;
      margin: 0 10px;
    }

    .or-text {
      font-size: 14px;
      font-weight: bold;
      color: #555;
      text-transform: uppercase;
    }
  </style>

</head>

<body>
  <div class="login-box">
  <div class="card-body">
        <div class="logo-container img">
          <img src="<?= base_url('dist/img/bidan.png'); ?>" alt="Logo Klinik">
          <h1 class="header-title mt-3">KLINIK BIDAN SYIFA</h1>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/user/check') ?>" method="post">
          <?= csrf_field() ?>
          <div class="input-group">
            <input type="text" name="id_user" class="form-control" placeholder="ID User" required>
            <div class="input-group-append">
              <span class="input-group-text fas fa-user"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
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

          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <div class="or-container">
            <span class="or-text">OR</span>
          </div>
          <a href="<?= base_url('/user/register') ?>" class="btn btn-primary btn-block">Daftar</a>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>

</html> 