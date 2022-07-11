<?php
$id = $_GET['id'];
$buku = [];
if (isset($id)) {
    $buku = Buku::find($id);
    if ($buku == null) {
        echo '<script>window.location="' . config('app.url') . '/index.php?page=buku&error=data-tidak-ada"</script>';
    }
} else {
    echo '<script>window.location="' . config('app.url') . '/index.php?page=buku"</script>';
}

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Buku</h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Buku</h6>
            </div>

            <form action="<?= config('app.url') ?>/controllers/buku.php?action=edit&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?= $buku['judul'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" value="<?= $buku['pengarang'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" value="<?= $buku['penerbit'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $buku['th_terbit'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?= $buku['jumlah_buku'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" value="<?= $buku['kategori'] ?>">
                            <option <?php if ($buku['kategori'] == 'Novel') {
                                        echo "selected";
                                    } ?>>Novel</option>
                            <option <?php if ($buku['kategori'] == 'Laporan') {
                                        echo "selected";
                                    } ?>>Laporan</option>
                            <option <?php if ($buku['kategori'] == 'Filsafat') {
                                        echo "selected";
                                    } ?>>Filsafat</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Foto Buku</label>
                        <input type="file" class="form-control-file" name="foto" id="foto">
                    </div>
                    <img id='preview' src="<?= config('app.url') ?><?= $buku['gambar'] ?>" width="200px">


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
        $("#tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
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