<?php
if (isset($_GET['kdRM'])) {
    $kdRM = $_GET['kdRM'];
}
?>    
    <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action='<?= "".base_url('authpetugas/inputRM?kdRM=')."".$kdRM.""?>' method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="input" class="form-label">Kode Rekam Medis</label>
                            <input name="kodeRM" id="inputID" class="form-control" value="<?=$kdRM?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Diagnosa</label>
                            <input type="text" class="form-control" id="inputNama" name="diagnosa">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Diagnosa Sekunder</label>
                            <input type="text" class="form-control" id="input" name="diagnosa2">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tindakan</label>
                            <input type="text" class="form-control" name="tindakan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Komplikasi</label>
                            <input type="text" class="form-control" name="komplikasi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rujukan</label>
                            <input type="text" class="form-control" name="rujukan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keluhan</label>
                            <input type="text" class="form-control" name="keluhan">
                        </div>
                        <div class="col-md-12">
                            <label for="input" class="form-label">Obat</label>
                            <input type="text" class="form-control" name="obat">
                        </div>
                        <div class="col-md-12">
                            <label for="input" class="form-label">Tanggal Pencatatan</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" name="namaWali">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Hubungan Wali</label>
                            <input type="text" class="form-control" name="hub">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Nomor Telepon</label>
                            <input type="tel" pattern="[0-9]{12}" class="form-control" name="NoTelp">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAlamat" class="form-label">Alamat Wali</label>
                            <input type="text" class="form-control" id="inputAlamat" name="alamat">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Petugas</label>
                            <select name="nip" type="text" class="form-control">
                                <option value=""><-Nama Petugas-></option>
                                <?php 
                                    $petugas= $this->db->get_where('petugas', ['IdAkun' => $_SESSION['AdminCode']])->result_array();
                                    foreach($petugas as $formation): ?>
                                        <option value="<?= $formation['NIP']; ?>"><?= $formation['Nama']; ?></option>
                                    <?php endforeach?>;
                            </select>
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