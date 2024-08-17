<?php
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $data = $this->db->get_where('pasien', ['NIK' => $nik])->row_array();
    $pasien = [
        $nik = $data['NIK'],
        $nama = $data['Nama'],
        $JENKEL = $data['JenKel'],
        $TGLLAHIR = $data['TanggalLahir'],
        $GOLDRH = $data['GolDarah'],
		$NOTELPON = $data['NoTelp'],
		$ALAMAT = $data['Alamat'],
        $NAMAIBU = $data['NamaIbu'],
        $Umur = $data['Umur'],
        $Agama= $data['Agama'],
        $Pekerjaan = $data['Pekerjaan'],
        $penAkhir= $data['PendidikanTerakhir']
    ];
}
?>    
       <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action="<?= base_url('authpetugas/AksiEditPasien')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="input" class="form-label">NIK</label>
                            <input name="nik" id="inputID" class="form-control" type="number" value="<?= $nik?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $nama?>">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="input" name="namaIbu" value="<?= $NAMAIBU?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputTglLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="inputTglLahir" name="tgllahir" value="<?= $TGLLAHIR?>">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Umur</label>
                            <input type="text" class="form-control" name="umurPasien" value="<?= $Umur?>">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Golongan Darah</label>
                            <input type="text" class="form-control" name="golDarah" value="<?= $GOLDRH?>">
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-3">
                            <label class="form-label">Agama</label>
                            <select type="text" class="form-control" name="agama">
                                <option value="<?= $Agama?>"><?= $Agama?></option>
                                <option value="Islam">>Islam</option>
                                <option value="Kristen">>Kristen</option>
                                <option value="Katolik">>Katolik</option>
                                <option value="Hindu">>Hindu</option>
                                <option value="Buddha">>Buddha</option>
                                <option value="Khonghucu">>Khonghucu</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" value="<?= $Pekerjaan?>">
                        </div>
                        <div class="col-md-3">
                            <label for="input" class="form-label">Pendidikan Terakhir</label>
                            <select type="text" class="form-control" name="pendidikan">
                                <option value="<?= $penAkhir?>"><?= $penAkhir?></option>
                                <option value="SD">>SD</option>
                                <option value="SMP">>SMP</option>
                                <option value="SMA">>SMA</option>
                                <option value="S1">>S1</option>
                                <option value="S2">>S2</option>
                                <option value="S3">>S3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="input" class="form-label">Nomor Telepon</label>
                            <input type="tel" pattern="[0-9]{12}" class="form-control" name="NoTelp" value="<?= $NOTELPON?>">
                        </div>
                        <div class="col-md-12">
                            <label for="inputAlamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="inputAlamat" name="alamat" value="<?= $ALAMAT?>">
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