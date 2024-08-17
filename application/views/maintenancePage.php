<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyDOC | Sedang Dalam Pemeliharaan</title>
    <link rel="icon" href="<?= base_url('asset/image/logo.png') ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #fff;
            font-family: 'Arial', sans-serif;
            color: #233348;
        }

        .maintenance-container {
            text-align: center;
        }

        .maintenance-icon {
            width: auto; /* Sesuaikan dengan ukuran gambar Anda */
            height: 30rem; /* Sesuaikan dengan ukuran gambar Anda */
            margin-bottom: 0px;
            animation: pulsate 3s linear infinite;
        }

        .maintenance-text {
            font-size: 2em;
            margin-bottom: 20px;
        }

        @keyframes pulsate {
            0%, 100% {
                transform: scale(1);
            }
            75%, 25% {
                transform: scale(1.075);
            }
            50% {
                transform: scale(1.15);
            }
        }

        .contact-info {
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <img src="<?=base_url()?>asset/image/401.png" alt="Maintenance Icon" class="maintenance-icon">
        <div class="maintenance-text">Sedang Dalam Pemeliharaan</div>
        <div class="contact-info">
            Kami mohon maaf atas ketidaknyamanannya. Untuk bantuan, silakan hubungi <a href="mailto:medtech.corp2@gmail.com">medtech.corp2@gmail.com</a>.
        </div>
    </div>
</body>
</html>