<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealthyDOC | Pendaftaran Baru</title>
    <link rel="icon" href="<?php echo base_url('asset\image/logo.png') ?>">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/asset/css/regis.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        if($this->session->flashdata('notifikasi')){
            ?>
                <script>
                    Swal.fire({
                        title: "Layanan HealthyDoc",
                        text: "<?= $this->session->flashdata('notifikasi') ?>"
                        footer: '<a class="btn btn-primary" href="<?=base_url('login')?>">Login</a>'
                    });
                </script>
            <?php
        }
    ?>
    <div  id="Regist" class="card">
        <h5 class="card-header"><img src="<?php echo base_url('asset/image/logo.png') ?>" alt="Logo" width="auto" height="50" class="d-inline-block align-text-center">
        Halaman Register</h5>
        <div class="card-body">
            <form class="row g-2" action="<?php echo base_url('Regist/register')  ?>" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="input" class="form-label">Nama (Rumah Sakit)</label>
                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <label for="input" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-md-6">
                    <label for="input" class="form-label">Nomor Telepon</label>
                    <input type="tel" pattern="[0-9]{12}" class="form-control" name="NoTelp">
                </div>
                <div class="col-12">
                    <label class="form-label">Kategori</label>
                    <section class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioOptions" value="Rumah Sakit">
                            <label class="form-check-label" for="inlineRadio1">Rumah Sakit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioOptions" value="Klinik">
                            <label class="form-check-label" for="inlineRadio1">Klinik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioOptions" value="Praktek Mandiri">
                            <label class="form-check-label" for="inlineRadio1">Praktek Mandiri</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioOptions" value="Lainnya">
                            <label class="form-check-label" for="inlineRadio1">Lainnya</label>
                        </div>
                    </section>
                </div>
                <div class="col-12">
                    <label for="input" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="col-12">
                    <label for="input" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="8-24 Karakter">
                </div>
                <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Sign Up</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted" align="center">
            Kembali ke- <a href="<?= base_url()?>">Halaman Utama</a>
        </div>
    </div>
</body>
</html>