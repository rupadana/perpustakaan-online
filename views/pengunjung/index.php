<?php
$pengunjungs = Pengunjung::allWithAnggota();
// dd($pengunjungs);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Pengunjung</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pengunjung</h6>
        <a href="<?= config('app.url') ?>/index.php?page=pengunjung/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm card-action"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['success'])) {
        ?>
            <div class="alert alert-success" role="alert">

                <?php getSuccessMessage($_GET['success']) ?>
            </div>

        <?php } ?>
        <div class="table-responsive">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Keperluan</th>
                        <th>Mencari</th>
                        <th>Saran</th>
                        <th>Tanggal Kunjungan</th>

                        <th colspan="1" rowspan="1" width="120px">Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Keperluan</th>
                        <th>Mencari</th>
                        <th>Saran</th>
                        <th>Tanggal Kunjungan</th>
                        <th colspan="1" rowspan="1">Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($pengunjungs as $key => $pengunjung) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td class="sorting_1"><?= $pengunjung['nama']  ?></td>
                            <td><?= $pengunjung['kelas']  ?></td>
                            <td><?= $pengunjung['keperluan']  ?></td>
                            <td><?= $pengunjung['cari']  ?></td>
                            <td><?= $pengunjung['saran']  ?></td>
                            <td><?= $pengunjung['tgl_kunjung']  ?></td>
                            <td>

                                <span>
                                    <a class="btn btn-sm btn-danger" onclick="hapus(<?= $pengunjung['id']  ?>)"><i class="fas fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function hapus(id) {
            var result = confirm("Hapus data?");
            if (result) {
                window.location.href = `<?= config('app.url') ?>/controllers/pengunjung.php?action=hapus&id=${id}`;
            }
        }
    </script>