<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<?php

if ($_SESSION['admin']['role'] == 'admin') {

	$anggotaBarus = Anggota::getAnggotaBaru();

	$pengunjungBarus = Pengunjung::getPengunjungBaru();

?>



	<div class="row">
		<div class=" col-md-4 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Anggota
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= Anggota::count() ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class=" col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Buku
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= Buku::count() ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-book fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class=" col-md-4 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Pengunjung
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= Pengunjung::count() ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-male fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-6 col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Anggota Baru</h6>
				</div>
				<div class="card-body">
					<ul class="list-anggotas">
						<?php
						foreach ($anggotaBarus as $key => $anggota) {
							# code...
						?>
							<li>
								<div class="row align-items-center">
									<img class="img-profile rounded-circle mr-3" width="50px" src="<?= $anggota['foto'] ?>" onerror="this.src = '/assets/img/undraw_profile.svg'">
									<span>
										<?= $anggota['nama'] ?>
									</span>
								</div>
							</li>

						<?php
						} ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Pengunjung Baru</h6>
				</div>
				<div class="card-body">
					<ul class="list-anggotas">
						<?php
						foreach ($pengunjungBarus as $key => $anggota) {
							# code...
						?>
							<li>
								<div class="row align-items-center">
									<img class="img-profile rounded-circle mr-3" width="50px" src="<?= $anggota['foto'] ?>" onerror="this.src = '/assets/img/undraw_profile.svg'">
									<span>
										<?= $anggota['nama'] ?>
									</span>
								</div>
							</li>

						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>


<?php
} else {
?>

	<div class="card">
		<div class="card-header">
			Masukkan data kunjungan
		</div>

		<form action="/controllers/pengunjung.php?action=tambah&from=dashboard" method="post">
			<div class="card-body">
				<input type="hidden" name="id_anggota" value="<?= $_SESSION['admin']['id_anggota'] ?>">
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


	<script>
		$(document).ready(function() {

			$("#tgl_kunjung").datepicker({
				format: "yyyy-mm-dd",
				autoclose: true
			});

		})
	</script>

<?php } ?>