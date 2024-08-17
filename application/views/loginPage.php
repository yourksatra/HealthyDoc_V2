<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyDOC | Login Page</title>
    <link rel="icon" href="<?php echo base_url('asset/image/logo.png') ?>">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url()?>asset/css/log.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
        if($this->session->flashdata('notifikasi')){
            ?>
    <script>
    Swal.fire({
        title: "HealthyDoc Alert!!!",
        text: "<?= $this->session->flashdata('notifikasi') ?>"
    });
    </script>
    <?php
        }
    ?>
    <div class="body">
        <div class="container" id="container">
            <div class="form-container register-container">
                <form method="POST" action="<?=base_url('')?>Login/logpetugas">
                    <h1>Login Petugas</h1>
                    <input type="text" placeholder="NIP" name="NIP">
                    <input type="tel" pattern="[0-9]{12}" placeholder="Nomor Handphone" name="NoTelp">
                    <button>Login</button>
                </form>
            </div>
            <div class="form-container login-container">
                <form method="POST" action="<?=base_url('')?>login/logadmin">
                    <h1>Login Admin</h1>
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <!-- <div class="content">
						<div class="pass-link">
							<a href="#">Forgot password?</a>
						</div>
					</div> -->
                    <button>Login</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="title">HealthyDOC <br> Medtech</h1>
                        <p>Admin</p>
                        <button class="ghost" id="login">Login Admin
                            <i class="lni lni-arrow-left login"></i>
                        </button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="title">HealthyDOC <br> Medtech</h1>
                        <p>Petugas</p>
                        <button class="ghost" id="register">Login Petugas
                            <i class="lni lni-arrow-right register"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>asset/js/log.js"></script>
</body>

</html>