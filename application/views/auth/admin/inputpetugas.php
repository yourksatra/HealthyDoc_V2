    <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:7rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action="<?php echo base_url('authadmin/AksiInsert_P')  ?>" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="input" class="form-label">NIP</label>
                            <input name="nip" pattern="[0-9]{18}" id="inputID" class="form-control" type="number">
                        </div>
                        <div class="col-12">
                            <label for="input" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama" name="nama">
                        </div>
                        <div class="col-12">
                            <label for="input" class="form-label">Nomor Telepon</label>
                            <input type="tel" pattern="[0-9]{12}" class="form-control" name="NoTelp">
                        </div>
                        <div class="col-5">
                            <label for="input" class="form-label">Profesi</label>
                            <input type="text" class="form-control" id="inputTTL" name="profesi">
                        </div>
                        <div class="col-md-4">
                            <label for="input" class="form-label">Status</label>
                            <section class="form-control" style="height: auto;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Non Aktif</label>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-3">
                            <label for="input" class="form-label">Jenis Kelamin</label>
                            <section class="form-control" style="height: auto;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Sex" id="inlineRadio1" value="P">
                                    <label class="form-check-label" for="inlineRadio1">P</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Sex" id="inlineRadio2" value="L">
                                    <label class="form-check-label" for="inlineRadio2">L</label>
                                </div>
                            </section>
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