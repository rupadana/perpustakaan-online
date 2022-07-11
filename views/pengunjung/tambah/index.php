<?php
$anggotas = Anggota::all();


?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pengunjung</h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengunjung</h6>
            </div>

            <form action="<?= config('app.url') ?>/controllers/pengunjung.php?action=tambah" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="keperluan">Anggota</label>
                        <select class="form-control" name="id_anggota" id="id_anggota" required>
                            <?php
                            foreach ($anggotas as $key => $anggota) {
                                # code...

                            ?>
                                <option value="<?= $anggota['id'] ?>"><?= $anggota['nama'] ?></option>

                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan" required>
                    </div>
                    <div class="form-group">
                        <label for="mencari">Mencari</label>
                        <input type="text" class="form-control" id="mencari" name="mencari" placeholder="Mencari" required>
                    </div>
                    <div class="form-group">
                        <label for="saran">Saran</label>
                        <input type="text" class="form-control" id="saran" name="saran" placeholder="Saran" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kunjung">Tanggal Kunjungan</label>
                        <input type="text" class="form-control" id="tgl_kunjung" name="tgl_kunjung" placeholder="Tanggal Kunjungan" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">
                        Tambah sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#tgl_kunjung").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });

    })
</script>