<?php include 'header.php' ?>

<!-- content -->
<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Kegiatan
            </div>
            <div class="box-body">
                <a href="tambah-kegiatan.php"><i class='fa fa-plus'></i> Tambah</a>
                
                <?php 
                    if (isset($_GET['success'])) {
                    '<div class="alert alert-success">' . $_GET['success'] . '</div>';
                    } 
                ?>

                <form action="">
                    <div class="input-group">
                        <input type="text" name="key" placeholder="Pencarian">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $where = "WHERE 1=1";
                        if (isset($_GET['key'])) {
                            $where .= " AND nama LIKE '%" . addslashes($_GET['key']) . "%' ";
                        }
                        $kegiatan = mysqli_query($conn, "SELECT * FROM kegiatan $where ORDER BY id DESC");
                        if (mysqli_num_rows($kegiatan) > 0) {
                            while ($p = mysqli_fetch_array($kegiatan)) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['nama'] ?></td>
                                    <td><?= $p['keterangan'] ?></td>
                                    <td><img src="../uploads-kegiatan/<?= $p['gambar'] ?>" width="100px"></td>
                                    <td>
                                        <a href="edit-kegiatan.php?id=<?= $p['id'] ?>" title="Edit"><i class="fa fa-edit"></i></a> |
                                        <a href="hapus.php?idkegiatan=<?= $p['id'] ?>" onclick="return confirm('Hapus Data?')" title="Hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">Data Tidak Ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>