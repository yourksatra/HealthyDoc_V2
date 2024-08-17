    <div class="home">
        <div class="home-content">
            <div class="card tabel" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(100rem/30);">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode Rekam Medis</th>
                                <th>NIK PASIEN</th>
                                <th>Tanggal Terbit</th>
                                <th>Detail Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($RekamMedis as $row){
                                echo "
                                    <tr>
                                        <td>" . $row['kodeRME'] . "</td>
                                        <td>" . $row['NIK_pasien'] . "</td>
                                        <td>" . $row['Date'] . "</td>
                                        <td>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detailRM".$row['kodeRME']."'>Data RM</button>
                                            <div class='modal fade' id='detailRM".$row['kodeRME']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Data Rekam Medis (".$row['kodeRME'].")</h1>
                                                        </div>
                                                        <div class='modal-body'>
                                                            ";
                                                                $pin = $row['kodeRME'];                                                            
                                                                $hasil = $this->db->query("SELECT * FROM detailrme WHERE KodeRME = '$pin';");
                                                                foreach($hasil->result() as $row)
                                                                {
                                                                    echo"<a href='".base_url('authadmin/detailRM?kdRM=')."".$row->KodeRME."&date=".$row->Tanggal."'>$row->Tanggal</a><br><br>"; 
                                                                }
                                                        echo"
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a type='button' href='".base_url('authadmin/dtPemeriksaanPasien?kdRM=')."".$pin."' class='btn btn-info'>Pemeriksaan</a>
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