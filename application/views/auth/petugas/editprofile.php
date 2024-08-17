    <div class="home">
        <div class="home-content">
            <div class="card profile" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(200rem/30);">
                    <form class="row g-2" action="<?= base_url('authpetugas/profileupload')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="inputNIP" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="inputID" name="nip" value="<?= $_SESSION['nip'] ?>" readonly="readonly">
                        </div>
                        <div class="col-12">
                            <label for="inputNama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $Petugas['Nama'] ?>" readonly="readonly">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Foto Profile</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="fileCover" name="filefoto">
                            </div>
                        </div>
                        <div class="col-12" align="center" style="margin-top: 2rem">
                            <button type="submit" class="btn btn-outline-primary" name="simpan" value="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('vendor\js') ?>\script.js"></script>
        </body>

        </html>