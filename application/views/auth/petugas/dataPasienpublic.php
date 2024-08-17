    <div class="home">
        <div class="home-content">
            <div class="card tabel" style="margin-top:5rem;">
                <div class="card-header">
					<ul class="nav nav-pills">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url() ?>authpetugas/dataPasien">Data Local</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="<?= base_url() ?>authpetugas/dataPasienpublic">Data Public</a>
						</li>
					</ul>
				</div>
                <div class="card-body">
                    <div align="left" style="margin: 1rem calc(100rem/30);">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <div style="margin: 2rem; margin-top: -0.5rem;">
                                <a href="<?= base_url('authpetugas/inputPasien') ?>" class="btn btn-primary" style="margin-left: -2rem;">+ Input Pasien Baru</a>
                            </div>
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th width='50'>JENIS KELAMIN</th>
                                    <th>DETAIL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Pasien as $row)
                                    echo "
                                        <tr>
                                            <td>" . $row['NIK'] . "</td>
                                            <td>" . $row['Nama'] . "</td>
                                            <td>" . $row['TanggalLahir'] . "</td>
                                            <td>" . $row['JenisKelamin'] . "</td>
                                            <td>
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detailPasien".$row['NIK']."'>Detail</button>
                                                <div class='modal fade' id='detailPasien".$row['NIK']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detail Data Pasien</h1>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <table class='table table-borderless'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>".$row['NIK']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NAMA</td>
                                                                            <td>".$row['Nama']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SEX</td>
                                                                            <td>".$row['JenisKelamin']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>TTL</td>
                                                                            <td>".$row['TanggalLahir']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>UMUR</td>
                                                                            <td>".$row['Umur']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>AGAMA</td>
                                                                            <td>".$row['Agama']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>PEKERJAAN</td>
                                                                            <td>".$row['Pekerjaan']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>PENDIDIKAN TERAKHIR</td>
                                                                            <td>".$row['PendidikanTerakhir']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>GOLONGAN DARAH</td>
                                                                            <td>".$row['GolDarah']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>ALAMAT</td>
                                                                            <td>".$row['Alamat']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NO TELPON</td>
                                                                            <td>".$row['NoTelp']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NAMA IBU</td>
                                                                            <td>".$row['NamaIbu']."</td>
                                                                        </tr>  
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                <a class='btn btn-info' href='" .base_url('authPetugas/editPasien?nik='). "" . $row['NIK'] . "'>Edit</a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <a class='btn btn-info' href='" .base_url('authPetugas/newRM?nik='). "" . $row['NIK'] . "'>+Rekam Medis</a> 
                                            </td>
                                        </tr>
                                    ";
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="detailPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Pasien</h1>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tbody>
                                                <tr><td>NIK</td><td> <?= $row['NIK'] ?></td></tr>
                                                <tr><td>NAMA</td><td> <?= $row['Nama'] ?></td></tr>
                                                <tr><td>SEX</td><td> <?= $row['JenisKelamin'] ?></td></tr>
                                                <tr><td>TTL</td><td> <?= $row['TanggalLahir'] ?></td></tr>
                                                <tr><td>UMUR</td><td> <?= $row['Umur'] ?></td></tr>
                                                <tr><td>AGAMA</td><td> <?= $row['Agama'] ?></td></tr>
                                                <tr><td>PEKERJAAN</td><td> <?= $row['Pekerjaan'] ?></td></tr>
                                                <tr><td>PENDIDIKAN TERAKHIR</td><td> <?= $row['PendidikanTerakhir'] ?></td></tr>
                                                <tr><td>GOLONGAN DARAH</td><td> <?= $row['GolDarah'] ?></td></tr>
                                                <tr><td>ALAMAT</td><td> <?= $row['Alamat'] ?></td></tr>
                                                <tr><td>NO TELPON</td><td> <?= $row['NoTelp'] ?></td></tr>
                                                <tr><td>NAMA IBU</td><td> <?= $row['NamaIbu'] ?></td></tr>
                                            </tbody>
                                        </table> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class='btn btn-info' href="<?= base_url('authPetugas/editPasien?nik='.$row['NIK'].'')?>">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="<?php echo base_url('asset\js') ?>\script.js"></script>
</body>
</html>