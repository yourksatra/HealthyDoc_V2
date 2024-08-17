<?php
if (isset($_GET['kdRM'])) {
    $kdRM = $_GET['kdRM'];
	$date = $_GET['date'];
    $RekamMedis= $this->db->get_where('detailrm', ['Tanggal' => $date, 'KodeRME' => $kdRM ])->result_array();
    $data= $this->db->get_where('detailrme', ['KodeRME' => $kdRM])->result_array();
}
?> 
    <div class="home">
        <div class="home-content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="margin-top:5rem; margin-left: 4rem; width:50rem;">
                        <div align="left" style="margin: 1rem calc(100rem/20);">
                            <table class="table table-striped table-bordered" style="width:100%;">
                                <tbody>
                                    <?php
                                    foreach ($RekamMedis as $row){
                                        echo "
                                            <tr>
                                                <th>Kode RM</th>
                                                <td>" . $row['KodeRME'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Diagnosa</th>
                                                <td>" . $row['Diagnosa'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Diagnosa Sekunder</th>
                                                <td>" . $row['DiagnosaSekunder'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Rujukan</th>
                                                <td>" . $row['Rujukan'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Keluhan</th>
                                                <td>" . $row['Keluhan'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Komplikasi</th>
                                                <td>" . $row['Komplikasi'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Tindakan</th>
                                                <td>" . $row['Tindakan'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Obat</th>
                                                <td>" . $row['Obat'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Wali</th>
                                                <td>" . $row['NamaWali'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Hubungan Ke-Pasien</th>
                                                <td>" . $row['HubunganWali'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Wali</th>
                                                <td>" . $row['AlamatWali'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>No Telpon Wali</th>
                                                <td>" . $row['NoTelponWali'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>NIP Petugas</th>
                                                <td>" . $row['NIP'] . "</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Petugas</th>
                                                <td>" . $row['Nama'] . "</td>
                                            </tr>
                                        ";}
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card tabel" style="margin-top:5rem; width:35rem; margin-left:9rem;">
                        <div align="left" style="margin: 1rem;">
                            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Kode Rekam Medis</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $row){
                                        echo "
                                            <tr>
                                                <td>" . $row['KodeRME'] . "</td>
                                                <td><a href='".base_url('authpetugas/detailRM?kdRM=')."".$row['KodeRME']."&date=".$row['Tanggal']."'>".$row['Tanggal']."</a></td>
                                            </tr>
                                        ";}
                                    ?>
                                </tbody>
                            </table>
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