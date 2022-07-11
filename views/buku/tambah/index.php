<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Buku</h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku</h6>
            </div>

            <form action="<?= config('app.url') ?>/controllers/buku.php?action=tambah" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <option>Novel</option>
                            <option>Laporan</option>
                            <option>Filsafat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Foto Buku</label>
                        <input type="file" class="form-control-file" name="foto" id="foto" required>
                    </div>
                    <img id='preview' width="200px">


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