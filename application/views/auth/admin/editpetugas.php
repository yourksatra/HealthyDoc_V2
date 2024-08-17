<?php
if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $data = $this->db->get_where('petugas', ['NIP' => $nip])->row_array();
    $petugas = [
        $nip = $data['NIP'],
        $name = $data['Nama'],
        $JENKEL = $data['JenKel'],
		$NOTELPON = $data['NoTelp'],
		$STATUS = $data['Status'],
		$PROFESI = $data['Profesi']
    ];
}
?>    
    <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:7rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action="<?php echo base_url('authadmin/AksiEdit_P')  ?>" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="input" class="form-label">NIP</label>
                            <input name="nip" id="inputID" class="form-control" type="number" value="<?= $nip?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="input" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $name?>">
                        </div>
                        <div class="col-12">
                            <label for="input" class="form-label">Nomor Telepon</label>
                            <input type="tel" pattern="[0-9]{12}" class="form-control" name="NoTelp" value="<?= $NOTELPON?>">
                        </div>
                        <div class="col-5">
                            <label for="input" class="form-label">Profesi</label>
                            <input type="text" class="form-control" id="inputTTL" name="profesi" value="<?= $PROFESI?>">
                        </div>
                        <div class="col-md-4" hidden>
                            <label for="input" class="form-label">Status</label>
                            <input type="text" class="form-control" id="inputTTL" name="Status" value="<?= $STATUS?>">
                        </div>
                        <div class="col-md-3">
                            <label for="input" class="form-label">Jenis Kelamin</label>
                            <?php
                                if ($JENKEL == 'P') {
                                    echo "                                
                                            <section class='form-control' style='height: auto;'>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='Sex' id='inlineRadio1' value='P' checked>
                                                    <label class='form-check-label' for='inlineRadio1'>P</label>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='Sex' id='inlineRadio2' value='L'>
                                                    <label class='form-check-label' for='inlineRadio2'>L</label>
                                                </div>
                                            </section>
                                        ";
                                } else {
                                    echo "                                
                                            <section class='form-control' style='height: auto;'>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='Sex' id='inlineRadio1' value='P'>
                                                    <label class='form-check-label' for='inlineRadio1'>P</label>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='Sex' id='inlineRadio2' value='L' checked>
                                                    <label class='form-check-label' for='inlineRadio2'>L</label>
                                                </div>
                                            </section>
                                        ";
                                }
                            ?>
                        </div>
                        <div class="col-12" align="center" style="margin-top: 2rem">
                            <button type="submit" class="btn btn-outline-primary" name="input" value="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('asset\js\script.js') ?>"></script>
</body>
</html>