<body>
	<div class="home" id="formDashboard">
		<div class="home-content">
			<div class="card mb-3" style="max-width: 540px; max-height:200px; margin: 5rem; display:block">
				<div class="row g-0">
					<div class="col-md-4">
						<div class="row" style="max-width:180px; margin-right:5px">
							<img src="<?= base_url('asset/image-upload/').$Petugas['IMG']; ?>" alt="edit profile untuk menambah foto" style="max-height:180px;">
						</div>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?= $Petugas['Nama']; ?></h5>
							<p class="card-text">NIP <?= $Petugas['NIP']; ?></p>
						</div>
						<div class="card-body">
							<a class="btn btn-primary" href="<?=base_url('authpetugas/editProfile')?>">Edit Foto Profile</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card tabel">
				<div align="left" style="margin: 1rem calc(100rem/30);">
					<h2 style="margin-top: 1rem; margin-bottom:1rem; margin-left:1rem;">Data Pelayanan</h2>
					<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>NIP PETUGAS</th>
									<th>TANGGAL PELAYANAN</th>
									<th>KODE REKAM MEDIS</th>
									<th>NIK PASIEN</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($Pelayanan as $row)
									echo "
										<tr>
											<td>" . $row['NIP'] . "</td>
											<td>" . $row['TglPelayanan'] . "</td>
											<td>" . $row['kodeRME'] . "</td>
											<td>" . $row['NIK_pasien'] . "</td>
										</tr>
									";
								?>
							</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script src="<?php echo base_url('asset\js\script.js') ?>"></script>
</html>