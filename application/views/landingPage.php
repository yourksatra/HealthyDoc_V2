<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthyDOC | RME</title>
    <link rel="icon" href="<?php echo base_url('asset/image/logo.png') ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('') ?>asset/css/footer.css">
    <link rel="stylesheet" href="<?= base_url('') ?>asset/css/main.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>asset/css/utilities.css" />
    <!-- normalize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BoxIcon -->
    <link rel='stylesheet' href='https://unpkg.com/boxicons@latest/css/boxicons.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
</head>
<header class="header">
    <nav id="home "class="navbar navbar-expand-lg">
<?php
    if($this->session->flashdata('notifikasi')){
        ?>
        <script>
            Swal.fire({
                title: "Pesan HealthyDoc",
                text: "<?= $this->session->flashdata('notifikasi') ?>"
            });
        </script>
        <?php
    }
?>
        <div class="container">
                <div class="brand-and-toggler d-flex align-items-center justify-content-between">
                    <a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center">
                        <img src="<?=base_url()?>asset/image/header.png" alt="Logo" width="auto" height="70"
                            class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div id="navbarNavDropdown" class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url()?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>home/price">Harga</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url() ?>home/search"><i class='bx bx-chevron-right icon'></i>Pencarian Data</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>login/index"><i class='bx bx-chevron-right icon'></i>Login</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('')?>regist"><button class="btn">Langganan</button></a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="element-one">
        <img src="<?= base_url('') ?>asset/image/element-img-1.png" alt="">
    </div>
    <div class="banner">
        <div class="container">
            <div class="banner-content">
                <div class="banner-left">
                    <div class="content-wrapper">
                        <h1 class="banner-title">HealthyDOC<br>the Future<br> of Electronic <br>Medical Record</h1>
                        <p class="text text-white">Mulai dari Administrasi, Pelayanan, dan Dokumentasi Rekam Medis Tersedia HealthyDoc</p>
                        <a href="#about" class="btn">Tentang HealthyDoc</a>
                    </div>
                </div>
                <div class="banner-right d-flex align-items-center justify-content-end">
                    <img src="<?= base_url()?>asset/image/banner-image.png" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<body>
    <main style="margin-top:-5rem;">
        <section class="sc-services">
            <div class="services-shape">
                <img src="<?=base_url()?>asset/image/curve-shape-1.png" alt="">
            </div>
            <div class="container">
                <div class="services-content">
                    <div class="title-box text-center">
                        <div class="content-wrapper">
                            <h3 class="title-box-name">Mengapa anda harus memilih healthydoc</h3>
                            <div class="title-separator mx-auto"></div>
                            <p class="text title-box-text">because</p>
                        </div>
                    </div>
                    <div class="services-list">
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-1.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Implementasi Cepat</h5>
                            <p class="text">Dengan implementasi cepat, Anda dapat dengan mudah dan segera mengakses
                                informasi kesehatan yang Anda butuhkan. Tidak ada waktu yang terbuang untuk menemukan
                                jawaban atas pertanyaan kesehatan Anda.</p>
                        </div>
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-2.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Terintegrasi Dengan Kemenkes</h5>
                            <p class="text">Sebagai bagian dari Kemenkes, HealthyDoc menyajikan informasi kesehatan yang
                                resmi dan terpercaya. Pengguna dapat mempercayai data dan saran kesehatan yang diberikan
                                karena telah melalui verifikasi dari lembaga kesehatan pemerintah.</p>
                        </div>
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-3.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Design User Friendly</h5>
                            <p class="text">Website HealthyDoc dirancang dengan navigasi yang mudah dipahami. Pengguna
                                dapat dengan cepat menemukan informasi yang mereka cari tanpa bingung atau kesulitan
                                dalam mengakses menu dan halaman.</p>
                        </div>
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-4.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Keamanan Data Tingkat Tinggi</h5>
                            <p class="text">Hanya pihak yang berwenang, seperti tenaga medis dan pengguna terverifikasi,
                                yang memiliki akses penuh ke data medis. Setiap akses dicatat dan dipantau untuk
                                mencegah akses yang tidak sah.</p>
                        </div>
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-5.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Sesuai Standar Akreditasi</h5>
                            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt eveniet
                                repellat hic ad culpa maxime quibusdam impedit repellendus dignissimos voluptate?</p>
                        </div>
                        <div class="services-item">
                            <div class="item-icon">
                                <img src="<?=base_url()?>asset/image/service-icon-6.png" alt="service icon">
                            </div>
                            <h5 class="item-title fw-7">Layanan Maintenance 24 Jam</h5>
                            <p class="text">Layanan Maintenance 24 Jam memantau aktivitas website secara konstan,
                                memungkinkan identifikasi dini terhadap potensi ancaman keamanan atau gangguan sistem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about -->
        <section class="sc-grid sc-grid-one" id="about">
            <div class="container">
                <div class="grid-content d-grid align-items-center">
                    <div class="grid-img">
                        <img src="<?=base_url()?>asset/image/logo.png" alt="">
                    </div>
                    <div class="grid-text">
                        <div class="content-wrapper text-start">
                            <div class="title-box">
                                <h3 class="title-box-name text-white">HealthyDOC the Future</h3>
                                <div class="title-separator mx-auto"></div>
                            </div>
                            <p class="text title-box-text text-white">HealthyDOC merupakan sebuah layanan digital untuk
                                mencatat rekam medis pasien, sesuai PERATURAN MENTERI KESEHATAN TENTANG REKAM MEDIS
                                Nomor 24 Tahun 2022 tentang Rekam Medis bahwa Perkembangan Teknologi Digital dalam
                                masyarakat
                                mengakibatkan transformasi digitalisasi pelayanan kesehatan sehingga Rekam Medis perlu
                                diselenggarakan secara elektronik dengan prinsip Keamanan dan Kerahasiaan Data dan
                                Informasi.
                                HelthyDOC bekerja sama dengan para Dokter dan Tenaga Kesehatan terkait dalam layanan
                                penyimpanan data berbasis Web Server.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--contact -->
        <a id="contact"></a>
        <section class="contact section-padding">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-1">
                            <h2>Contact Us</h2>
                            <p>Hubungi Kami Jika Anda Menemukan Kesalahan</p>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-4 pb-2">
                        <form action="<?= base_url()?>contact" method="POST" class="bg-light p-2 m-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Nama" required="" type="text" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Email" required="" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Pesan" required=""rows="3" name="pesan"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>