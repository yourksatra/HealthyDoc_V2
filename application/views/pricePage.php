<body>
    <main>
        <div class="container d-flex flex-column justify-content-center mt-5 text-center">
            <!-- awal harga -->
            <h1>Aplikasi Yang akan me-Revolusi <br> Cara Kerja Tenaga Medis</h1>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="card text-center price-col">
                            <div class="card-body">
                                <h2 class="card-title text-success">Starter</h2>
                                <p class="card-text">Diskon 100% <br> Bulan Pertama</p>
                                <h3>Rp <span class="fs-3">0</span>/1Bulan</h3>
                                <hr>
                                <p>Daftar Modul</p>
                                <ul class="text-left">
                                    <li>E Rekam Medis - Dokter</li>
                                    <br>
                                </ul>
                                <button><a href="<?= base_url('') ?>regist?id=A1" class="nav-link" id="harga-1"
                                        style="color: #fff;">Daftar Sekarang</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center price-col">
                            <div class="card-body">
                                <h2 class="card-title text-success">Advanced</h2>
                                <p class="card-text">Diskon 15%</p>
                                <h3>Rp <span class="fs-3">255.000</span>/3Bulan</h3>
                                <hr>
                                <p>Daftar Modul</p>
                                <ul class="text-left">
                                    <li>E Rekam Medis - Dokter</li>
                                    <li>E Rekam Medis - Dokter</li>
                                    <li>E Rekam Medis - Dokter</li>
                                </ul>
                                <button disabled><a href="#" class="nav-link" id="harga-1" style="color: #fff;">Daftar
                                        Sekarang</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center price-col">
                            <div class="card-body">
                                <h2 class="card-title text-success">Premium</h2>
                                <p class="card-text">Diskon 20%</p>
                                <h3>Rp <span class="fs-3">320.000</span>/4Bulan</h3>
                                <hr>
                                <p>Daftar Modul</p>
                                <ul class="text-left">
                                    <li>E Rekam Medis - Dokter</li>
                                    <li>E Rekam Medis - Dokter</li>
                                    <li>E Rekam Medis - Dokter</li>
                                </ul>
                                <button disabled><a href="#" class="nav-link" id="harga-1" style="color: #fff;">Daftar
                                        Sekarang</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- awal FAQ -->
            <div class="" style=" margin-top:100px; margin-bottom:30px;">
                <h4 class="mb-5">FAQ (Frequently Asked Questions)</h4>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Apa itu Rekam Medis?</button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <P>Rekam Medis adalah kumpulan informasi medis pasien yang mencakup riwayat kesehatan,
                                    hasil pemeriksaan, diagnosis, pengobatan, dan informasi lainnya terkait perawatan
                                    kesehatan pasien.</P>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-4">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara mengakses Website Rekam Medis Pasien?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <P>Untuk mengakses Website Rekam Medis Pasien, Anda harus terdaftar sebagai pasien di
                                    rumah sakit atau klinik yang memiliki layanan tersebut. Setelah pendaftaran, Anda
                                    akan diberikan kredensial login untuk masuk ke akun pribadi Anda.</P>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-4">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apakah akses ke Website Rekam Medis bersifat rahasia dan aman?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <P>Ya, akses ke Website Rekam Medis Pasien bersifat rahasia dan aman. Informasi medis
                                    hanya dapat diakses oleh pasien itu sendiri dan tenaga medis yang berwenang, dan
                                    dilindungi oleh sistem keamanan yang kuat.</P>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-4">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Apa saja informasi yang dapat diakses di Website Rekam Medis Pasien?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="collapseFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <P>Di Website Rekam Medis Pasien, Anda dapat mengakses informasi seperti riwayat
                                    kesehatan, diagnosis, hasil pemeriksaan laboratorium, resep obat, serta jadwal dan
                                    hasil kunjungan medis terakhir.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir FAQ -->
        </div>
    </main>
</body>

</html>