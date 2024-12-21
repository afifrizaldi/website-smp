<?php include 'header.php'; ?>

<div class="section">
    <div class="container">

        <?php
            $kegiatan = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id = '" . $_GET['id'] . "' ");
            if (mysqli_num_rows($kegiatan) == 0) {
                echo "<script>window.location='index.php'</script>";
            }
            $p        = mysqli_fetch_object($kegiatan);
        ?>

        <h3 class="text-center"><?= $p->nama ?></h3>
        <img src="uploads-kegiatan/<?= $p->gambar ?>" width="100%" class="image">
        <?= $p->keterangan ?>
    </div>
</div>

<?php include 'footer.php'; ?>