<?php
$bukus = Buku::all();
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Buku</h6>
        <a href="<?= config('app.url') ?>/index.php?page=buku/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm card-action"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <?php
            if (isset($_GET['success'])) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?php getSuccessMessage($_GET['success']) ?>
                </div>

            <?php } ?>
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                    <tr>
                        <th colspan="1" rowspan="1">Judul</th>
                        <th colspan="1" rowspan="1">Pengarang</th>
                        <th colspan="1" rowspan="1">Penerbit</th>
                        <th colspan="1" rowspan="1">Tahun</th>
                        <th colspan="1" rowspan="1">Stok</th>
                        <th colspan="1" rowspan="1">Kategori</th>

                        <th colspan="1" rowspan="1" width="120px">Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="1" rowspan="1">Judul</th>
                        <th colspan="1" rowspan="1">Pengarang</th>
                        <th colspan="1" rowspan="1">Penerbit</th>
                        <th colspan="1" rowspan="1">Tahun</th>
                        <th colspan="1" rowspan="1">Stok</th>
                        <th colspan="1" rowspan="1">Kategori</th>
                        <th colspan="1" rowspan="1">Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($bukus as $key => $buku) {

                    ?>
                        <tr>
                            <td class="sorting_1"><?= $buku['judul']  ?></td>
                            <td><?= $buku['pengarang']  ?></td>
                            <td><?= $buku['penerbit']  ?></td>
                            <td><?= $buku['th_terbit']  ?></td>
                            <td><?= $buku['jumlah_buku']  ?></td>
                            <td><?= $buku['kategori']  ?></td>
                            <td>
                                <span>
                                    <a class="btn btn-sm btn-primary" href="<?= config('app.url') ?>/index.php?page=buku/edit&id=<?= $buku['id']  ?>"><i class="fas fa-edit"></i></a>
                                </span>
                                <span>
                                    <a class="btn btn-sm btn-danger" onclick="hapus(<?= $buku['id']  ?>)"><i class="fas fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function hapus(id) {
        var result = confirm("Hapus data?");
        if (result) {
            window.location.href = `<?= config('app.url') ?>/controllers/buku.php?action=hapus&id=${id}`;
        }
    }
</script>