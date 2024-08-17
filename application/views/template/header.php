<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthyDOC | <?=$title?></title>
    <link rel="icon" href="<?php echo base_url('asset/image/logo.png') ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
	<script src='https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js'></script>
	<script src='https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js'></script>
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
<header>
    <nav class="navbar navbar-expand-lg fixed-top" style="padding:3rem 0 1.5rem 0;">
        <div class="container">
                <div class="brand-and-toggler d-flex align-items-center justify-content-between">
                    <a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center">
                        <img src="<?=base_url()?>asset/image/header.png" alt="Logo" width="auto" height="70"
                            class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
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
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Layanan</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url() ?>home/search"><i class='bx bx-chevron-right icon'></i>Pencarian Data</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>login/index"><i class='bx bx-chevron-right icon'></i>Login</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>home/#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('')?>regist"><button class="btn">Langganan</button></a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
</header>
<!-- end of header -->