<?php
if (isset($_GET['kdRM'])) {
    $kdRM = $_GET['kdRM'];
}
?>    
    <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action='<?= "".base_url('authpetugas/inputPem?kdRM=')."".$kdRM.""?>' method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="input" class="form-label">Kode Rekam Medis</label>
                            <input name="kodeRM" id="inputID" class="form-control" value="<?=$kdRM?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Kondisi Pasien</label>
                            <input type="text" class="form-control" id="inputNama" name="kondisipasien">
                        </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Kondisi Umum</label>
                            <input type="text" class="form-control" id="input" name="KU">
                        </div>
                        <div class="col-md-12">
                            <label for="input" class="form-label">Kasus</label>
                            <input type="text" class="form-control" name="kasus">
                        </div>
                        <div class="col-md-12">
                            <label for="input" class="form-label">Anamnesa</label>
                            <input type="text" class="form-control" name="anamnesa">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kesadaran (GCS)</label>
                            <input type="text" class="form-control" name="GCS">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Denyut Nadi</label>
                            <input type="text" class="form-control" name="nadi">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Suhu Tubuh</label>
                            <input type="text" class="form-control" name="suhu">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tekanan Darah</label>
                            <input type="text" class="form-control" name="td">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Resusitasi</label>
                            <section class="form-control" style="height: auto;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="resusitasi" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="resusitasi" id="inlineRadio2" value="0" checked>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4">
                            <label for="input" class="form-label">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" name="tanggal">
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