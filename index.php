<?php include 'header.php'; ?>

<!-- BAGIAN BANNER -->
<div class="banner" style="background-image: url('identitas/<?= $d->foto_sekolah ?>');">
    <div class="banner-text">
        <div class="container">
            <h3>Selamat Datang di <?= $d->nama ?></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, accusamus minus. Fugit, obcaecati dignissimos. Fuga consequatur aspernatur architecto maxime. Repellendus aut officiis itaque et. Asperiores unde porro labore fugiat earum.</p>
        </div>
    </div>
</div>

<!-- BAGIAN SAMBUTAN -->
<div class="section">
    <div class="container text-center">
        <h3>Sambutan Kepala Sekolah</h3>
        <img src="identitas/<?= $d->foto_kepsek ?>" width="100px">
        <h4><?= $d->nama_kepsek ?></h4>
        <p><?= $d->sambutan_kepsek ?></p>
    </div>
</div>

<!-- BAGIAN KEGIATAN -->
<div class="section" id="kegiatan">
    <div class="container text-center">
        <h3>Kegiatan</h3>

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

<!-- BAGIAN INFORMASI -->
<div class="section">
    <div class="container text-center">
        <h3>Informasi Terbaru</h3>

        <?php
        $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
        if (mysqli_num_rows($informasi) > 0) {
            while ($p = mysqli_fetch_array($informasi)) {
        ?>

                <div class="col-4">
                    <a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thumbnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads-informasi/<?= $p['gambar'] ?>');"></div>
                            <div class="thumbnail-text">
                                <?= substr($p['judul'], 0, 50)  ?>
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