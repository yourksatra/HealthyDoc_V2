<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>

	<!----===== Boxicons CSS ===== -->
	<link rel='icon' href='<?= base_url('asset\image\logo.png') ?>'>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel='stylesheet' href='https://unpkg.com/boxicons@latest/css/boxicons.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
	<link rel='stylesheet' href='<?= base_url('') ?>asset\css\style.css'>

	<!-- JS Jquery -->
	<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
	<script src='https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js'></script>
	<script src='https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<title><?= $title ?></title>
</head>
<?php
//sidebar admin 
if ($otoritas=='Admin'){
	$admin = $this->db->get_where('admin', ['IdAkun' => $_SESSION['IdAdmin']])->row_array(); 
	echo "
<nav class='sidebar'>
	<header>
		<div class='image-text'>
			<span class='image'>
				<img class='big' src='"?><?= base_url('asset\image\header.png') ?><?="' alt=''>
				<img class='mini' src='"?><?= base_url('asset\image\logo.png') ?><?="' alt=''>
			</span>
		</div>
	</header>
	<div class='menu-bar'>
		<div class='menu'>
			<ul class='menu-links'>
				<li class='nav-link aktif'>
					<a href='"?><?= base_url() ?><?="authadmin'>
						<i class='bx bx-home-alt icon'></i>
						<span class='text nav-text'>Dashboard</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href="?><?= base_url('authadmin/dataPetugas') ?><?=">
						<i class='bx bx-group icon'></i>
						<span class='text nav-text'>Data Petugas</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authadmin/dataPasien'>
						<i class='bx bx-user icon'></i>
						<span class='text nav-text'>Pasien</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authadmin/dataRM'>
						<i class='bx bx-clinic icon'></i>
						<span class='text nav-text'>Rekam Medis</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authadmin/dtPemeriksaan'>
						<i class='bx bx-file-find icon'></i>
						<span class='text nav-text'>Pemeriksaan</span>
					</a>
				</li>
			</ul>
		</div>
		<div class='bottom-content'>
			<li class=''>
				<a href='"?><?= base_url() ?><?="authadmin/dtTransaksi'>
					<i class='bx bx-wallet-alt icon'></i>
					<span class='text nav-text'>Data Transaksi</span>
				</a>
			</li>
			<li class=''>
				<a href='"?><?= base_url() ?><?="login/logoutAdmin'>
					<i class='bx bx-log-out icon'></i>
					<span class='text nav-text'>Logout</span>
				</a>
			</li>
		</div>
	</div>
</nav>
<section class='home'>
	<nav>
		<div class='image-text'>
			<i class='bx bx-chevron-left toggle'></i>
			<span class='name'>".$title." ".$admin['Name']."</span>
		</div>
		
	</nav>
</section>
	";
//sidebar petugas
}else{
	$petugas = $this->db->get_where('petugas', ['NIP' => $_SESSION['nip']])->row_array(); 
	echo "
<nav class='sidebar'>
	<header>
		<div class='image-text'>
			<span class='image'>
				<img class='big' src='"?><?= base_url('asset\image\header.png') ?><?="' alt=''>
				<img class='mini' src='"?><?= base_url('asset\image\logo.png') ?><?="' alt=''>
			</span>
		</div>
	</header>
	<div class='menu-bar'>
		<div class='menu'>
			<ul class='menu-links'>
				<li class='nav-link aktif'>
					<a href='"?><?= base_url() ?><?="authpetugas'>
						<i class='bx bx-home-alt icon'></i>
						<span class='text nav-text'>Dashboard</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href="?><?= base_url('authpetugas/dataPetugas') ?><?=">
						<i class='bx bx-group icon'></i>
						<span class='text nav-text'>Data Petugas</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authpetugas/dataPasien'>
						<i class='bx bx-user icon'></i>
						<span class='text nav-text'>Pasien</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authpetugas/dataRM'>
						<i class='bx bx-clinic icon'></i>
						<span class='text nav-text'>Rekam Medis</span>
					</a>
				</li>
				<li class='nav-link'>
					<a href='"?><?= base_url() ?><?="authpetugas/dtPemeriksaan'>
						<i class='bx bx-file-find icon'></i>
						<span class='text nav-text'>Pemeriksaan</span>
					</a>
				</li>
			</ul>
		</div>
		<div class='bottom-content'>
			<li class=''>
				<a href='"?><?= base_url() ?><?="login/logoutPetugas'>
					<i class='bx bx-log-out icon'></i>
					<span class='text nav-text'>Logout</span>
				</a>
			</li>
			<li class='mode'>
				<div class='sun-moon'>
					<i class='bx bx-moon icon moon'></i>
					<i class='bx bx-sun icon sun'></i>
				</div>
				<span class='mode-text text'>Dark mode</span>
				<div class='toggle-switch'>
					<span class='switch'></span>
				</div>
			</li>
		</div>
	</div>
</nav>
<section class='home'>
	<nav>
		<div class='image-text'>
			<i class='bx bx-chevron-left toggle'></i>
			<span class='name'>".$title."</span>
		</div>
		<div class='profile-details'>
			<img src='".base_url('asset/image-upload/').$Petugas['IMG']."' alt=''>
			<span class='admin_name'>".$petugas['Nama']."</span>
		</div>
	</nav>
</section>
	";
}
?>
<script src='<?= base_url('asset\js\script.js') ?>'></script>