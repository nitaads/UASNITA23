<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Styling sederhana */
        body { font-family: Arial; background: #f5f5f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 350px; }
        h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group input { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        .btn { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .error, .success { color: red; text-align: center; margin-bottom: 10px; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="error"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?= validation_errors('<div class="error">', '</div>'); ?>

    <?= form_open('auth/login'); ?>

    <div class="form-group">
        <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password">
    </div>

    <button type="submit" class="btn">Login</button>

    <?= form_close(); ?>

    <p style="text-align:center; margin-top: 15px;">
        Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Daftar di sini</a>
    </p>
</div>

</body>
</html>
