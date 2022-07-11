<?php
$id = $_GET['id'];
$anggota = [];
if (isset($id)) {
    $anggota = DB::table("data_anggota")->join("users", "users.id_anggota", "data_anggota.id")->where("data_anggota.id", "=", $id)->first();

    if ($anggota == null) {
        echo '<script>window.location="' . config('app.url') . '/index.php?page=anggota&error=data-tidak-ada"</script>';
    }
} else {
    echo '<script>window.location="' . config('app.url') . '/index.php?page=anggota"</script>';
}

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Anggota</h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
            </div>
            <form action="<?= config('app.url') ?>/controllers/anggota.php?action=edit&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required value="<?= $anggota['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="<?= $anggota['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?= $anggota['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?= $anggota['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required value="<?= $anggota['password'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required value="<?= $anggota['kelas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required value="<?= $anggota['tanggal_lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="L" <?php isSelected("L", $anggota['jk']) ?>>Laki-laki</option>
                            <option value="P" <?php isSelected("P", $anggota['jk']) ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="admin" <?php isSelected("admin", $anggota['role']) ?>>Admin</option>
                            <option value="user" <?php isSelected("user", $anggota['role']) ?>>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto Anggota</label>
                        <input type="file" class="form-control-file" name="foto" id="foto">
                    </div>

                    <img id='preview' width="200px" src="<?= config('app.url') ?><?= $anggota['foto'] ?>">

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">
                        Simpan sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#tanggal_lahir").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $("#foto").change(function() {
            var foto = this.files[0];
            console.log(foto)
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(foto);
        });
    })
</script>