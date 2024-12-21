<?php include 'header.php'; ?>

<div class="section">
    <div class="container">
        <h3 class="text-center">Kegiatan</h3>

        <?php
        $kegiatan = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY id DESC");
        if (mysqli_num_rows($kegiatan) > 0) {
            while ($k = mysqli_fetch_array($kegiatan)) {
        ?>

                <div class="col-4">
                    <a href="detail-kegiatan.php?id=<?= $k['id'] ?>" class="thumbnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads-kegiatan/<?= $k['gambar'] ?>');"></div>
                            <div class="thumbnail-text">
                                <?= $k['nama'] ?>
                            </div>
                        </div>
                    </a>
                </div>

            <?php }
        } else { ?>

            Tidak Ada Data

        <?php } ?>
        
    </div>
</div>

<?php include 'footer.php'; ?>