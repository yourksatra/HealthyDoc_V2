-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 02:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthydoc`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InputPelayanan` (IN `kdRM` VARCHAR(10), IN `nip` VARCHAR(18))   BEGIN
insert into pelayanan values (nip,kdRM,CURRENT_DATE);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InputRM` (IN `nik` VARCHAR(16), IN `id` VARCHAR(6))   BEGIN
declare kodebaru varchar(10);
select fcRMCode() into kodebaru;
insert into rekam_medis values (kodebaru,CURRENT_DATE,id,nik);
select * from rekam_medis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginAccess` (IN `token` VARCHAR(16), IN `otoritas` VARCHAR(10), IN `userId` VARCHAR(18))   BEGIN
declare newId int(11);
declare type tinyint(1) DEFAULT 1;
select fcAccessToken() into newId;
insert into accesstoken values (newId,token,CURRENT_TIMESTAMP,NULL,type,otoritas,userId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Regist` (IN `Email` VARCHAR(80), IN `Name` VARCHAR(100), IN `Kategori` VARCHAR(100), IN `alamat` TEXT, IN `NoTelp` INT(12), IN `Pass` VARCHAR(255), IN `Token` VARCHAR(16), IN `Otoritas` VARCHAR(10))   BEGIN
declare kodebaru varchar(6);
declare newId int(11);
declare type tinyint(1) DEFAULT 0;
select fcIdAdmin() into kodebaru;
select fcAccessToken() into newId;
insert into admin values (kodebaru,CURRENT_TIMESTAMP,Email,NULL,Name,Kategori,alamat,NoTelp,Pass,type,NULL,NULL);
insert into accesstoken values (newId,token,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,type,otoritas,kodebaru);
select * from admin;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fcAccessToken` () RETURNS INT(11)  BEGIN
    DECLARE last_code int(11);
    DECLARE new_code int(11);
    SELECT MAX(Id) INTO last_code FROM accesstoken;
    IF last_code IS NULL THEN
        SET new_code = 1;
    ELSE
        SET new_code = last_code +1;
    END IF;
    RETURN new_code;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcIdAdmin` () RETURNS VARCHAR(6) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE last_code VARCHAR(6);
    DECLARE new_code VARCHAR(6);
    SELECT MAX(IdAkun) INTO last_code FROM admin;
    IF last_code IS NULL THEN
        SET new_code = 'A00001';
    ELSE
        SET @first_char = SUBSTRING(last_code, 1, 1);
        SET @last_digits = CAST(SUBSTRING(last_code, 2) AS UNSIGNED);
        IF @last_digits = 99999 THEN
            SET @first_char = CHAR(ASCII(@first_char) + 1);
            SET @last_digits = 1;
        ELSE
            SET @last_digits = @last_digits + 1;
        END IF;
        SET new_code = CONCAT(@first_char, LPAD(@last_digits, 5, '0'));
    END IF;
    RETURN new_code;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcRMCode` () RETURNS VARCHAR(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE current_date_part VARCHAR(8);
    DECLARE alphabet_part CHAR(2);
    DECLARE new_code VARCHAR(10);

    SET current_date_part = DATE_FORMAT(NOW(), '%Y%m%d');
    SELECT RIGHT(MAX(kodeRME), 2) INTO alphabet_part FROM rekam_medis;

    IF alphabet_part IS NULL THEN
        SET alphabet_part = 'AA';
    ELSE
        IF ASCII(RIGHT(alphabet_part, 1)) = 90 THEN
            SET alphabet_part = CONCAT(
                CHAR(ASCII(LEFT(alphabet_part, 1)) + 1),
                'A'
            );
        ELSE
            SET alphabet_part = CONCAT(
                LEFT(alphabet_part, 1),
                CHAR(ASCII(RIGHT(alphabet_part, 1)) + 1)
            );
        END IF;
    END IF;
    SET new_code = CONCAT(current_date_part, alphabet_part);
    RETURN new_code;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accesstoken`
--

CREATE TABLE `accesstoken` (
  `id` int(11) NOT NULL,
  `token` varchar(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `Otoritas` varchar(10) NOT NULL,
  `UserId` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesstoken`
--

INSERT INTO `accesstoken` (`id`, `token`, `created_at`, `last_used_at`, `type`, `Otoritas`, `UserId`) VALUES
(1, 'f64649200b2d1313', '2023-12-06 23:06:28', '2023-12-06 23:18:43', 1, 'Admin', 'A00001'),
(2, 'b2b25414237b8dba', '2023-12-06 23:56:37', '2023-12-06 23:56:37', 0, 'Admin', 'A00003'),
(3, 'e6d094547a4d3059', '2023-12-06 23:58:19', '2023-12-06 23:58:36', 1, 'Admin', 'A00003'),
(4, '5502501a1691fdf6', '2023-12-06 23:59:04', '2023-12-07 00:00:02', 1, 'Admin', 'A00001'),
(5, '078fd27fcb578819', '2023-12-07 00:00:20', '2023-12-07 00:01:06', 1, 'Petugas', '123'),
(6, '19f8b594265565bc', '2023-12-07 00:15:14', '2023-12-07 00:15:14', 0, 'Admin', 'A00003'),
(7, 'd226e2d05f409de9', '2023-12-07 00:16:40', '2023-12-07 00:17:11', 1, 'Admin', 'A00003'),
(8, '0e7ed3751bc678da', '2023-12-07 00:17:43', '2023-12-07 00:18:12', 1, 'Admin', 'A00001'),
(9, '079d79c6ed21f6d2', '2023-12-07 00:18:32', '2023-12-07 00:18:45', 1, 'Petugas', '123'),
(10, '211acb6e9df87631', '2023-12-07 04:35:59', '2023-12-07 04:41:00', 1, 'Admin', 'A00001'),
(11, '0005348714b5abfa', '2023-12-07 13:36:55', '2023-12-07 13:38:13', 1, 'Admin', 'A00001'),
(12, '567d539e8fc0a948', '2023-12-07 13:38:33', '2023-12-07 13:52:41', 1, 'Petugas', '123'),
(13, 'ba8fb60c25eaecee', '2023-12-07 22:23:39', '2023-12-07 22:23:39', 0, 'Admin', 'A00003'),
(14, 'd06106ff296c8c5e', '2023-12-13 02:56:21', '2023-12-13 03:16:09', 1, 'Admin', 'A00001'),
(15, 'e0f5b1f1e50d9736', '2023-12-13 03:17:39', '2023-12-13 03:30:42', 1, 'Petugas', '123'),
(16, '0bf0c6553998e9e8', '2023-12-13 03:31:13', '2023-12-13 03:33:39', 1, 'Admin', 'A00001'),
(17, '4dd6d596d9b7bc1e', '2023-12-13 03:34:02', '2023-12-13 03:34:33', 1, 'Petugas', '123'),
(18, '2ebf5a21ab925b5a', '2023-12-13 08:55:36', '2023-12-13 08:56:18', 1, 'Admin', 'A00001'),
(19, 'a5cf379f11345775', '2023-12-13 08:56:44', '2023-12-13 09:52:12', 1, 'Petugas', '123'),
(20, '2d1603a3ece0efc1', '2023-12-19 22:42:24', '2023-12-20 00:06:44', 1, 'Admin', 'A00001'),
(21, 'cc5ef240bd289fc8', '2023-12-20 00:10:26', '2023-12-20 00:14:41', 1, 'Admin', 'A00001'),
(27, 'bbc5ebd1bc907228', '2024-01-06 07:04:26', NULL, 1, 'Admin', 'A00001'),
(28, 'f7a90fccea66ed9e', '2024-01-12 04:02:00', '2024-01-12 04:02:18', 1, 'Petugas', '123'),
(29, 'f374d9b0f909ccfd', '2024-01-15 03:02:19', '2024-01-15 04:46:27', 1, 'Admin', 'A00001'),
(30, '66b2b9c9c8f1b7c0', '2024-03-01 10:38:40', '2024-03-01 10:45:22', 1, 'Petugas', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdAkun` varchar(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `Email` varchar(80) NOT NULL,
  `email_verified` timestamp NULL DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `NoTelp` int(12) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_status_active` datetime DEFAULT NULL,
  `otp` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdAkun`, `created_at`, `Email`, `email_verified`, `Name`, `Kategori`, `alamat`, `NoTelp`, `Password`, `status`, `last_status_active`, `otp`) VALUES
('A00001', '2023-11-28 01:49:55', 'satriabagas@students.amikom.ac.id', '2023-11-28 01:50:06', 'Klinik Tongfang', 'Klinik', 'Bantul, Banguntapan', 2147483647, '$2y$10$qVHZN/e1R2zUhC.ZwIrZLesSAX0UaHjyUhEd.UAdNK1r94gXyHy2C', 1, NULL, '27919'),
('A00002', '2023-11-29 09:33:00', 'farrossyahreal7@gmail.com', NULL, 'RSBU', 'Rumah Sakit', 'jaksel', 2147483647, '12345', 0, NULL, '28684'),
('A00003', '2023-12-07 22:23:39', 'dominicbaswara@students.amikom.ac.id', '2023-12-07 22:26:53', 'Amikom Medical Center', 'Klinik', 'Ringroad Utara No.125, Sleman, Yogyakarta', 2147483647, '$2y$10$38RSOepB.fjpb4UfIdw4SueutdTPfTgQd50akoiKUXEEl.DPEyl5O', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailrm`
-- (See below for the actual view)
--
CREATE TABLE `detailrm` (
`KodeRME` varchar(10)
,`Diagnosa` text
,`DiagnosaSekunder` text
,`Tindakan` text
,`Komplikasi` text
,`Rujukan` text
,`Keluhan` text
,`Tanggal` date
,`Obat` text
,`NamaWali` varchar(100)
,`HubunganWali` varchar(100)
,`AlamatWali` varchar(150)
,`NoTelponWali` varchar(13)
,`NIP` varchar(18)
,`Nama` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `detailrme`
--

CREATE TABLE `detailrme` (
  `KodeRME` varchar(10) NOT NULL,
  `Diagnosa` text NOT NULL,
  `DiagnosaSekunder` text NOT NULL,
  `Tindakan` text NOT NULL,
  `Komplikasi` text NOT NULL,
  `Rujukan` text NOT NULL,
  `Keluhan` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Obat` text NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `NamaWali` varchar(100) NOT NULL,
  `HubunganWali` varchar(100) NOT NULL,
  `AlamatWali` varchar(150) NOT NULL,
  `NoTelponWali` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailrme`
--

INSERT INTO `detailrme` (`KodeRME`, `Diagnosa`, `DiagnosaSekunder`, `Tindakan`, `Komplikasi`, `Rujukan`, `Keluhan`, `Tanggal`, `Obat`, `NIP`, `NamaWali`, `HubunganWali`, `AlamatWali`, `NoTelponWali`) VALUES
('20231201AA', 'Flu', '-', 'Rawat Jalan', '-', '-', 'Sesak Nafas', '2023-12-05', 'Paracetamol', '000', 'Ibu', 'Ibu Kandung', 'Ringroad Utara No.125, Sleman, Yogyakarta', '085740240860'),
('20231201AA', 'Demam dan Bantuk', 'Rabies', 'Rawat Inap', '-', '-', 'Lemas', '2023-12-04', 'Flu', '123', 'Nurdin', 'Kakak', 'Bantul', '087700549895');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dtpelayanan`
-- (See below for the actual view)
--
CREATE TABLE `dtpelayanan` (
`NIP` varchar(18)
,`NamaPetugas` varchar(100)
,`TglPelayanan` date
,`kodeRME` varchar(10)
,`IdAkun` varchar(6)
,`NIK_pasien` varchar(16)
,`NamaPasien` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dtpemeriksaan`
-- (See below for the actual view)
--
CREATE TABLE `dtpemeriksaan` (
`kodeRME` varchar(10)
,`IdAkun` varchar(6)
,`NIK_pasien` varchar(16)
,`NamaPasien` varchar(50)
,`JenisKelamin` varchar(20)
,`Umur` int(5)
,`GolDarah` varchar(20)
,`Anamesa` text
,`Kasus` text
,`KeadaanUmum` text
,`Kesadaran` varchar(50)
,`Nadi` varchar(10)
,`Suhu` varchar(10)
,`TekananDarah` varchar(10)
,`Resusitasi` tinyint(1)
,`KondisiPasien` text
,`date` date
,`NIP` varchar(18)
,`NamaPetugas` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `Email` varchar(100) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kritiksaran`
--

INSERT INTO `kritiksaran` (`Email`, `Nama`, `Pesan`) VALUES
('dominicbaswara@students.amikom.ac.id', 'Dom', 'Hai'),
('dominicbaswara@students.amikom.ac.id', 'Dom', 'ioo'),
('amikommc@amikom.ac.id', 'Farros', 'Helo');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `NIK` varchar(16) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `NamaIbu` varchar(50) NOT NULL,
  `JenisKelamin` varchar(20) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Umur` int(5) NOT NULL,
  `Agama` varchar(10) NOT NULL,
  `GolDarah` varchar(20) NOT NULL,
  `Pekerjaan` varchar(20) NOT NULL,
  `PendidikanTerakhir` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`NIK`, `Nama`, `NamaIbu`, `JenisKelamin`, `TanggalLahir`, `Umur`, `Agama`, `GolDarah`, `Pekerjaan`, `PendidikanTerakhir`, `Alamat`, `NoTelp`) VALUES
('0000000000', 'Nugrah Satria', 'Sari', 'L', '2023-12-01', 1, 'Katolik', 'AB', 'MAHASISWA', 'S2', 'Sumbawa', '085337363939'),
('1111111111111111', 'Ghalib Farros Syahreal', 'Yudi', 'L', '2023-12-01', 1, 'Islam', 'AB', 'MAHASISWA', 'SMA', 'Bantulselatan', '085740240860'),
('123456789', 'Melvin', 'Ibu', 'P', '2023-12-01', 1, 'Islam', 'AB', 'MAHASISWA', 'SMA', 'Medan', '089765432100'),
('1234567890123456', 'Dom', 'Sari', 'L', '2023-12-13', 20, 'Islam', 'AB', 'Mahasiswa', 'SD', 'Bantul', '087700549895');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `NIP` varchar(18) NOT NULL,
  `kodeRME` varchar(10) NOT NULL,
  `TglPelayanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`NIP`, `kodeRME`, `TglPelayanan`) VALUES
('123', '20231201AA', '2023-12-05'),
('123', '20231201AA', '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `order_id` char(25) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(13) NOT NULL,
  `transaction_time` varchar(19) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(3) NOT NULL,
  `IdAdmin` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`order_id`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `IdAdmin`) VALUES
('1326127612', 90000, 'bank_transfer', '2023-12-07 06:10:51', 'bca', '84807986664', 'https://app.sandbox.midtrans.com/snap/v1/transactions/5786cca0-46c2-43c9-92ee-fa3e45616a5b/pdf', '201', 'A00001'),
('1393658615', 90000, 'bank_transfer', '2023-12-08 05:23:51', 'bca', '84807658983', 'https://app.sandbox.midtrans.com/snap/v1/transactions/04a042cf-098a-4c7b-8b99-298a27e6f947/pdf', '201', 'A00003'),
('1911972143', 255000, 'bank_transfer', '2023-12-07 06:59:52', 'bca', '84807257561', 'https://app.sandbox.midtrans.com/snap/v1/transactions/de560ef9-34f0-441d-9a6f-15189cbc974b/pdf', '201', 'A00001'),
('56801001', 320000, 'bank_transfer', '2023-12-07 11:36:36', 'bca', '84807255845', 'https://app.sandbox.midtrans.com/snap/v1/transactions/35912d34-3f77-474a-9139-660c53eb5bee/pdf', '200', 'A00001');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `kodeRME` varchar(10) NOT NULL,
  `KeadaanUmum` text NOT NULL,
  `Kesadaran` varchar(50) NOT NULL,
  `Nadi` varchar(10) NOT NULL,
  `Suhu` varchar(10) NOT NULL,
  `TekananDarah` varchar(10) NOT NULL,
  `Resusitasi` tinyint(1) NOT NULL,
  `Anamesa` text NOT NULL,
  `Kasus` text NOT NULL,
  `KondisiPasien` text NOT NULL,
  `date` date NOT NULL,
  `NIP` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`kodeRME`, `KeadaanUmum`, `Kesadaran`, `Nadi`, `Suhu`, `TekananDarah`, `Resusitasi`, `Anamesa`, `Kasus`, `KondisiPasien`, `date`, `NIP`) VALUES
('20231201AA', '-', '15 GCS', '95', '36', '120/80', 0, 'Pusing', '-', 'Kurang Sehat', '2023-12-05', '000'),
('20231201AA', 'Fisik Sehat', 'CM', '100', '37', '110/80', 0, 'Flu dan Batuk, terkadang Mual', 'Peradangan', 'Lemas', '2023-12-06', '000');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `NIP` varchar(18) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `JenKel` char(1) NOT NULL,
  `NoTelp` varchar(12) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Profesi` varchar(100) NOT NULL,
  `IMG` varchar(100) DEFAULT NULL,
  `otp` varchar(5) NOT NULL,
  `IdAkun` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`NIP`, `Nama`, `JenKel`, `NoTelp`, `Status`, `Profesi`, `IMG`, `otp`, `IdAkun`) VALUES
('000', 'Dom', 'L', '085337363939', 1, 'DOKTER', NULL, '', 'A00001'),
('1111', 'Syahreal', 'L', '085337363939', 1, 'RM', '111.jpeg', '46157', 'A00002'),
('123', 'Farros', 'L', '085337363939', 1, 'RM', '111.jpeg', '35594', 'A00001');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `kodeRME` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `IdAkun` varchar(6) NOT NULL,
  `NIK_pasien` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`kodeRME`, `Date`, `IdAkun`, `NIK_pasien`) VALUES
('20231201AA', '2023-12-01', 'A00001', '0000000000'),
('20231201AB', '2023-12-01', 'A00001', '123456789'),
('20231213AC', '2023-12-13', 'A00001', '1234567890123456');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rm_pasien`
-- (See below for the actual view)
--
CREATE TABLE `rm_pasien` (
`kodeRME` varchar(10)
,`IdAkun` varchar(6)
,`NIK` varchar(16)
,`Nama` varchar(50)
,`NamaIbu` varchar(50)
,`JenisKelamin` varchar(20)
,`TanggalLahir` date
,`Umur` int(5)
,`Agama` varchar(10)
,`GolDarah` varchar(20)
,`Pekerjaan` varchar(20)
,`PendidikanTerakhir` varchar(20)
,`Alamat` text
,`NoTelp` varchar(12)
);

-- --------------------------------------------------------

--
-- Structure for view `detailrm`
--
DROP TABLE IF EXISTS `detailrm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailrm`  AS SELECT `detailrme`.`KodeRME` AS `KodeRME`, `detailrme`.`Diagnosa` AS `Diagnosa`, `detailrme`.`DiagnosaSekunder` AS `DiagnosaSekunder`, `detailrme`.`Tindakan` AS `Tindakan`, `detailrme`.`Komplikasi` AS `Komplikasi`, `detailrme`.`Rujukan` AS `Rujukan`, `detailrme`.`Keluhan` AS `Keluhan`, `detailrme`.`Tanggal` AS `Tanggal`, `detailrme`.`Obat` AS `Obat`, `detailrme`.`NamaWali` AS `NamaWali`, `detailrme`.`HubunganWali` AS `HubunganWali`, `detailrme`.`AlamatWali` AS `AlamatWali`, `detailrme`.`NoTelponWali` AS `NoTelponWali`, `petugas`.`NIP` AS `NIP`, `petugas`.`Nama` AS `Nama` FROM (`detailrme` join `petugas` on(`detailrme`.`NIP` = `petugas`.`NIP`)) ;

-- --------------------------------------------------------

--
-- Structure for view `dtpelayanan`
--
DROP TABLE IF EXISTS `dtpelayanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dtpelayanan`  AS SELECT `petugas`.`NIP` AS `NIP`, `petugas`.`Nama` AS `NamaPetugas`, `pelayanan`.`TglPelayanan` AS `TglPelayanan`, `pelayanan`.`kodeRME` AS `kodeRME`, `rekam_medis`.`IdAkun` AS `IdAkun`, `rekam_medis`.`NIK_pasien` AS `NIK_pasien`, `pasien`.`Nama` AS `NamaPasien` FROM (((`petugas` join `pelayanan` on(`petugas`.`NIP` = `pelayanan`.`NIP`)) join `rekam_medis` on(`rekam_medis`.`kodeRME` = `pelayanan`.`kodeRME`)) join `pasien` on(`pasien`.`NIK` = `rekam_medis`.`NIK_pasien`)) ;

-- --------------------------------------------------------

--
-- Structure for view `dtpemeriksaan`
--
DROP TABLE IF EXISTS `dtpemeriksaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dtpemeriksaan`  AS SELECT `rekam_medis`.`kodeRME` AS `kodeRME`, `rekam_medis`.`IdAkun` AS `IdAkun`, `rekam_medis`.`NIK_pasien` AS `NIK_pasien`, `pasien`.`Nama` AS `NamaPasien`, `pasien`.`JenisKelamin` AS `JenisKelamin`, `pasien`.`Umur` AS `Umur`, `pasien`.`GolDarah` AS `GolDarah`, `pemeriksaan`.`Anamesa` AS `Anamesa`, `pemeriksaan`.`Kasus` AS `Kasus`, `pemeriksaan`.`KeadaanUmum` AS `KeadaanUmum`, `pemeriksaan`.`Kesadaran` AS `Kesadaran`, `pemeriksaan`.`Nadi` AS `Nadi`, `pemeriksaan`.`Suhu` AS `Suhu`, `pemeriksaan`.`TekananDarah` AS `TekananDarah`, `pemeriksaan`.`Resusitasi` AS `Resusitasi`, `pemeriksaan`.`KondisiPasien` AS `KondisiPasien`, `pemeriksaan`.`date` AS `date`, `petugas`.`NIP` AS `NIP`, `petugas`.`Nama` AS `NamaPetugas` FROM (((`rekam_medis` join `pasien` on(`rekam_medis`.`NIK_pasien` = `pasien`.`NIK`)) join `pemeriksaan` on(`rekam_medis`.`kodeRME` = `pemeriksaan`.`kodeRME`)) join `petugas` on(`pemeriksaan`.`NIP` = `petugas`.`NIP`)) ;

-- --------------------------------------------------------

--
-- Structure for view `rm_pasien`
--
DROP TABLE IF EXISTS `rm_pasien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rm_pasien`  AS SELECT `rekam_medis`.`kodeRME` AS `kodeRME`, `rekam_medis`.`IdAkun` AS `IdAkun`, `rekam_medis`.`NIK_pasien` AS `NIK`, `pasien`.`Nama` AS `Nama`, `pasien`.`NamaIbu` AS `NamaIbu`, `pasien`.`JenisKelamin` AS `JenisKelamin`, `pasien`.`TanggalLahir` AS `TanggalLahir`, `pasien`.`Umur` AS `Umur`, `pasien`.`Agama` AS `Agama`, `pasien`.`GolDarah` AS `GolDarah`, `pasien`.`Pekerjaan` AS `Pekerjaan`, `pasien`.`PendidikanTerakhir` AS `PendidikanTerakhir`, `pasien`.`Alamat` AS `Alamat`, `pasien`.`NoTelp` AS `NoTelp` FROM (`rekam_medis` join `pasien` on(`rekam_medis`.`NIK_pasien` = `pasien`.`NIK`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesstoken`
--
ALTER TABLE `accesstoken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`),
  ADD KEY `token_2` (`token`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAkun`);

--
-- Indexes for table `detailrme`
--
ALTER TABLE `detailrme`
  ADD KEY `idDokter` (`NIP`),
  ADD KEY `KodeRME` (`KodeRME`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD KEY `IdPetugas` (`NIP`),
  ADD KEY `kodeRME` (`kodeRME`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `IdAdmin` (`IdAdmin`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD KEY `kodeRME` (`kodeRME`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `IdAkun` (`IdAkun`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`kodeRME`),
  ADD KEY `IdPasien` (`NIK_pasien`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailrme`
--
ALTER TABLE `detailrme`
  ADD CONSTRAINT `detailrme_ibfk_4` FOREIGN KEY (`NIP`) REFERENCES `petugas` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailrme_ibfk_5` FOREIGN KEY (`KodeRME`) REFERENCES `rekam_medis` (`kodeRME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_3` FOREIGN KEY (`NIP`) REFERENCES `petugas` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelayanan_ibfk_4` FOREIGN KEY (`kodeRME`) REFERENCES `rekam_medis` (`kodeRME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `admin` (`IdAkun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `petugas` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_3` FOREIGN KEY (`kodeRME`) REFERENCES `rekam_medis` (`kodeRME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `idadmin` FOREIGN KEY (`IdAkun`) REFERENCES `admin` (`IdAkun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`NIK_pasien`) REFERENCES `pasien` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
