    <div class="home">
        <div class="home-content">
            <div class="card tabel" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(100rem/30);">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode Rekam Medis</th>
                                <th>NIK</th>
                                <th>Nama Pasien</th>
                                <th>Sex</th>
                                <th>Umur</th>
                                <th>Gol.Darah</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Pemeriksaan as $row){
                                echo "
                                    <tr>
                                        <td>" . $row['kodeRME'] . "</td>
                                        <td>" . $row['NIK_pasien'] . "</td>
                                        <td>" . $row['NamaPasien'] . "</td>                                           
                                        <td>" . $row['JenisKelamin'] . "</td>                                           
                                        <td>" . $row['Umur'] . "</td>                                           
                                        <td>" . $row['GolDarah'] . "</td>                                           
                                        <td>" . $row['date'] . "</td>                                           
                                        <td>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detailPEM".$row['kodeRME'].$row['date']."'>Detail</button>
                                            <div class='modal fade' id='detailPEM".$row['kodeRME'].$row['date']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Data Pemeriksaan (".$row['date'].")</h1>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <table class='table table-borderless'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Anamnesa</th>
                                                                            <td>".$row['Anamesa']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kasus</th>
                                                                            <td>".$row['Kasus']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Keadaan Umum</th>
                                                                            <td>".$row['KeadaanUmum']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kesadaran(GSC)</th>
                                                                            <td>".$row['Kesadaran']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nadi</th>
                                                                            <td>".$row['Nadi']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Suhu Tubuh</th>
                                                                            <td>".$row['Suhu']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tekanan Darah</th>
                                                                            <td>".$row['TekananDarah']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Resusitasi</th>
                                                                            <td>".$row['Resusitasi']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kondisi Pasien</th>
                                                                            <td>".$row['KondisiPasien']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>NIP Petugas</th>
                                                                            <td>".$row['NIP']."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Petugas</th>
                                                                            <td>".$row['NamaPetugas']."</td>
                                                                        </tr> 
                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            <a class='btn btn-info' href='".base_url('authpetugas/inputPem?kdRM=')."".$row['kodeRME']."'>+ Data baru</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </td>
                                    </tr>
                                ";}
                            ?>
                        </tbody>
                    </table>
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