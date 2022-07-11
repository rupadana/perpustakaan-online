<?php
$anggotas = Anggota::allWithRole();
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Anggota</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Anggota</h6>
        <a href="<?= config('app.url') ?>/index.php?page=anggota/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm card-action"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['success'])) {
        ?>
            <div class="alert alert-success" role="alert">

                <?php getSuccessMessage($_GET['success']) ?>
            </div>

        <?php } ?>
        <table class="table table-responsive table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Role</th>

                    <th colspan="1" rowspan="1" width="120px">Aksi</th>
                </tr>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Role</th>
                    <th colspan="1" rowspan="1">Aksi</th>

                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach ($anggotas as $key => $anggota) {

                ?>
                    <tr>
                        <td class="sorting_1"><?= $anggota['nama']  ?></td>
                        <td><?= $anggota['alamat']  ?></td>
                        <td><?= $anggota['email']  ?></td>
                        <td><?= $anggota['kelas']  ?></td>
                        <td><?= $anggota['tanggal_lahir']  ?></td>
                        <td><?= $anggota['jk'] == "P" ? "Perempuan" : "Laki-Laki"  ?></td>
                        <td><?= $anggota['role']  ?></td>
                        <td>
                            <span>
                                <a class="btn btn-sm btn-primary" href="<?= config('app.url') ?>/index.php?page=anggota/edit&id=<?= $anggota['id']  ?>"><i class="fas fa-edit"></i></a>
                            </span>
                            <span>
                                <a class="btn btn-sm btn-danger" onclick="hapus(<?= $anggota['id']  ?>)"><i class="fas fa-trash"></i></a>
                            </span>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function hapus(id) {
            var result = confirm("Hapus data?");
            if (result) {
                window.location.href = `<?= config('app.url') ?>/controllers/anggota.php?action=hapus&id=${id}`;
            }
        }
    </script>