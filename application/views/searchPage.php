<body>
  <main>
    <section>
        <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner search-banner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="<?= base_url('')?>asset/image/banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img src="<?= base_url('')?>asset/image/banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img src="<?= base_url('')?>asset/image/banner2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" data-bs-target="#carouselExampleFade" type="button" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-target="#carouselExampleFade" type="button" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <section class="search-sec">
        <div class="container">
            <form action="<?=base_url('pencarian')?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="NIK" name="NIK">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Nama Lengkap" name="NAMA">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button class="btn wrn-btn" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php
        if($NIK!=NULL){
            $pasien= $this->db->get_where('pasien', ['NIK' => $NIK])->row_array(); 
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NAMA</th>
                        <th scope="col">SEX</th>
                        <th scope="col">TANGGAL LAHIR</th>
                        <th scope="col">GOLONGAN DARAH</th>
                        <th scope="col">PEKERJAAN</th>
                        <th scope="col">NOMOR TELEPON</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$pasien['Nama']?></td>
                        <td><?=$pasien['JenisKelamin']?></td>
                        <td><?=$pasien['TanggalLahir']?></td>
                        <td><?=$pasien['GolDarah']?></td>
                        <td><?=$pasien['Pekerjaan']?></td>
                        <td><?=$pasien['NoTelp']?></td>
                    </tr>
                </tbody>
            </table>
            <table class='table table-hover' style='margin-top:10px;'>
                <?php
                        $rm= $this->db->get_where('rekam_medis', ['NIK_pasien' => $NIK])->result_array();
                        foreach ($rm as $key) {
                            $dtRM= $this->db->get_where('detailrm', ['KodeRME' => $key['kodeRME']])->result_array();
                            foreach ($dtRM as $row) {
                                echo "
                                <tbody>
                                    <tr>
                                        <th scope='col'>Riwayat Medis</th>
                                        <td>
                                            <a type='button' data-bs-toggle='modal' data-bs-target='#riwayat".$row['Tanggal']."'>".$row['Tanggal']."</a>
                                            <div class='modal fade' id='riwayat".$row['Tanggal']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Riwayat Medis Tanggal ".$row['Tanggal']."</h1>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <table class='table table-borderless'>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Diagnosa</th>
                                                                        <td>".$row['Diagnosa']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Diagnosa Sekunder</th>
                                                                        <td>".$row['DiagnosaSekunder']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Komplikasi</th>
                                                                        <td>".$row['Komplikasi']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Keluhan Pasien</th>
                                                                        <td>".$row['Keluhan']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Rujukan</th>
                                                                        <td>".$row['Rujukan']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tindakan</th>
                                                                        <td>".$row['Tindakan']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Obat</th>
                                                                        <td>".$row['Obat']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Petugas</th>
                                                                        <td>".$row['Nama']."</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                ";
                            }
                            $dtLab= $this->db->get_where('dtpemeriksaan', ['kodeRME' => $key['kodeRME']])->result_array();
                            foreach ($dtLab as $com) {
                                echo "
                                <tbody>
                                    <tr>
                                        <th scope='col'>Data Lab</th>
                                        <td>
                                            <a type='button' data-bs-toggle='modal' data-bs-target='#lab".$com['date']."'>".$com['date']."</a>
                                            <div class='modal fade' id='lab".$com['date']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Riwayat Lab Tanggal ".$com['date']."</h1>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <table class='table table-borderless'>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Anamnesa</th>
                                                                        <td>".$com['Anamesa']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Keadaan Umum</th>
                                                                        <td>".$com['KeadaanUmum']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Kondisi Pasien</th>
                                                                        <td>".$com['KondisiPasien']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Kasus</th>
                                                                        <td>".$com['Kasus']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>GCS</th>
                                                                        <td>".$com['Kesadaran']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Denyut Nadi</th>
                                                                        <td>".$com['Nadi']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Suhu Tubuh</th>
                                                                        <td>".$com['Suhu']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tekanan Darah</th>
                                                                        <td>".$com['TekananDarah']."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Petugas</th>
                                                                        <td>".$com['NamaPetugas']."</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                ";
                            }
                        }  
                    ?>
            </table>
        <?php
        }
    ?>
  </main>
</body>
</html>