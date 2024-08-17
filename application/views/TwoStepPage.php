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
		<?php 
			if ($this->session->userdata('nip')!=null) {
				echo "
					<div class='container' id='container'>
						<div class='form-container login-container'>
							<form method='POST' action='".base_url('twostep/Petugas')."'>
								<h1>2-Langkah Verifikasi Petugas</h1>
								<p>Masukkan OTP</p>
								<input type='text' name='otp'>
								<button>Kirim</button>
							</form>
						</div>
						<div class='overlay-container'>
							<div class='overlay'>
								<div class='overlay-panel overlay-right'>
									<h1 class='title'>HealthyDOC <br> Medtech</h1>
								</div>
							</div>
						</div>
					</div>
				";
			}else{
				echo "
					<div class='container' id='container'>
						<div class='form-container login-container'>
							<form method='POST' action='".base_url('twostep/Admin')."'>
								<h1>2-Langkah Verifikasi Admin</h1>
								<p>Masukkan OTP</p>
								<input type='text' name='otp'>
								<button>Kirim</button>
							</form>
						</div>
						<div class='overlay-container'>
							<div class='overlay'>
								<div class='overlay-panel overlay-right'>
									<h1 class='title'>HealthyDOC <br> Medtech</h1>
								</div>
							</div>
						</div>
					</div>
				";
			}
		?>
	</div>
</body>
</html>