<?php
    session_start();
    include '../koneksi.php';
    if (!isset($_SESSION['status_login'])) {
        echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
    }
    date_default_timezone_set("Asia/Nusa Tenggara Barat");
    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../identitas/<?= $d->favicon ?>">
    <title>Panel Admin - <?= $d->nama ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="container">
            <!-- NAVBAR BRAND -->
            <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>
            <!-- NAVBAR MENU -->
            <ul class="nav-menu float-left">
                <li><a href="index.php">Dashboard</a></li>

                <?php if ($_SESSION['ulevel'] == 'Super Admin') { ?>

                    <li><a href="pengguna.php">Pengguna</a></li>

                <?php } elseif ($_SESSION['ulevel'] == 'Admin') { ?>
                    <li><a href="kegiatan.php">Kegiatan</a></li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="informasi.php">Informasi</a></li>
                    <li>
                        <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

                        <!-- sub menu -->
                        <ul class="dropdown">
                            <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                            <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                            <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href="#"><?= $_SESSION['uname'] ?>(<?= $_SESSION['ulevel'] ?>)<i class="fa fa-caret-down"></i></a>

                    <!-- sub menu -->
                    <ul class="dropdown">
                        <li><a href="ubah-password.php">Ubah Password</a></li>
                        <li><a href="logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>