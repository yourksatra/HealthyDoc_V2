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
    <div class="home">
        <div class="home-content">
            <div class="card tabel" style="margin-top:5rem;">
                <div class="card-body">
                    <div align="left" style="margin: 1rem calc(100rem/30);">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th width='50'>JENIS KELAMIN</th>
                                    <th>NO TELEPON</th>
                                    <th>DETAIL</th>
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
                                            <td>" . $row['NoTelp'] . "</td>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
                                ?>
                            </tbody>
                        </table>
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