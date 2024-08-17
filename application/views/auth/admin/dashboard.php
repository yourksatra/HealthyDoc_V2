<body>
	<div class="home" id="formDashboard">
		<div class="row" style="margin-top:6rem;">
			<div class="col-lg-8 d-flex align-items-strech" style="margin-left:4rem;">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Data Pasien</h5>
                            </div>
                        </div>
                        <div id="chart" style="margin:1rem;"></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-3" style="margin-left:1rem;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h4 class="card-title fw-semibold">Profile</h4>
                                        <?php $admin = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="1000"><?= $admin['Name']?></th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                <tr>
                                                    <td><?= $admin['alamat']?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $admin['NoTelp']?></td>
                                                </tr>
                                                <td>
                                                    <a href="" type="button" data-bs-toggle='modal' data-bs-target='#profile'>
                                                        Selengkapnya <i class='bx bx-chevrons-up'></i>
                                                    </a>
                                                    <div class='modal fade' id='profile' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Profile</h1>
                                                                </div>
                                                                <div class='modal-body'>
                                                                    <table class='table table-borderless'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Nama</th>
                                                                                <td><?= $admin['Name']?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Alamat</th>
                                                                                <td><?= $admin['alamat']?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>No.Telepon</th>
                                                                                <td><?= $admin['NoTelp']?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Email</th>
                                                                                <td><?= $admin['Email']?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                    <!-- <a type='button' class='btn btn-info' href="">Edit</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top:1rem;">
                        <div class="card w-100">
                            <div class="card-body" >
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Navigator</h5>
                                    </div>
                                </div>
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <a class="btn btn-primary" href="<?= base_url('authadmin/dataPetugas') ?>">
                                            <i class='bx bx-group icon'></i>
                                        </a>
                                        <a class="btn btn-primary" href="<?= base_url('authadmin/dataPasien') ?>">
                                            <i class='bx bx-user icon'></i>
                                        </a>
                                        <a class="btn btn-primary" href="<?= base_url('authadmin/dataRM') ?>">
                                            <i class='bx bx-clinic icon'></i>
                                        </a>
                                        <a class="btn btn-primary" href="<?= base_url('authadmin/dtPemeriksaan') ?>">
                                            <i class='bx bx-file-find icon'></i>
                                        </a>
                                        <a class="btn btn-primary" href="<?= base_url('authadmin/dtTransaksi') ?>">
                                            <i class='bx bx-wallet-alt icon'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="home-content">
			<div class="card tabel" style="margin-right:3rem;margin-top:0.5rem;margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(100rem/30);">
					<h3 style="margin-top:1rem;margin-bottom:1rem;">Data Pelayanan</h3>
					<hr>
                    <table id="example" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIP PETUGAS</th>
                                <th>KODE REKAM MEDIS</th>
                                <th>TANGGAL PELAYANAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Pelayanan as $row)
                                echo "
                                    <tr>
                                        <td>" . $row['NIP'] . "</td>
                                        <td>" . $row['kodeRME'] . "</td>
                                        <td>" . $row['TglPelayanan'] . "</td>
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
<script src="<?= base_url()?>/asset/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url()?>/asset/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url()?>/asset/js/dashboard.js"></script>
</html>