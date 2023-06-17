<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">FUZZY MAMDANI</h1>
                    <p class="text-sm">Sistem Pakar Diagnosa Penyakit Pada Domba</p>
                    <?php if ($this->session->flashdata('pesan') != null) { ?>
                        <p class="text-center">
                            <?= $this->session->flashdata('pesan'); ?>
                        </p>
                    <?php } ?>
                    <form method="POST" action="<?= base_url("login/cek_login") ?>">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>