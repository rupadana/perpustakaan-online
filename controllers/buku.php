<?php

include __DIR__ . "/../helpers/loaders.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

if (Authentication::isLoggedIn()) {
	if ($action == "tambah") {


		try {
			if ($name = upload_file($_FILES['foto'])) {

				$judul = $_POST['judul'];
				$pengarang = $_POST['pengarang'];
				$penerbit = $_POST['penerbit'];
				$tahun = $_POST['tahun'];
				$stok = $_POST['stok'];
				$kategori = $_POST['kategori'];

				Buku::insert([
					"judul" => $judul,
					"pengarang" => $pengarang,
					"penerbit" => $penerbit,
					"th_terbit" => $tahun,
					"jumlah_buku" => $stok,
					"kategori" => $kategori,
					"tgl_input" => date("Y-m-d"),
					"gambar" =>  $name
				]);

				echo '<script>window.location="' . config('app.url') . '/index.php?page=buku&success=tambah-data"</script>';
			} else {
				echo '<script>alert("Masukan Gambar !");window.location="' . config('app.url') . '/index.php?page=buku"</script>';
			}
		} catch (\Exception $e) {
			echo '<script>alert("' . $e->getMessage() . '");window.location="' . config('app.url') . '/index.php?page=buku"</script>';
		}
	}

	if ($action == "edit") {
		$id = $_GET['id'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$kategori = $_POST['kategori'];

		$data = [
			"judul" => $judul,
			"pengarang" => $pengarang,
			"penerbit" => $penerbit,
			"th_terbit" => $tahun,
			"jumlah_buku" => $stok,
			"kategori" => $kategori,
			"tgl_input" => date("Y-m-d")
		];




		try {
			$gambar = "";
			if (!isEmptyImage($_FILES['foto'])) {
				$gambar = upload_file($_FILES['foto']);

				$data['gambar'] = $gambar;
			}
			$buku = Buku::updateByPk($id, $data);
			echo '<script>window.location="' . config('app.url') . '/index.php?page=buku&success=edit-data"</script>';
		} catch (\Exception $e) {
			echo '<script>alert("' . $e->getMessage() . '");window.location="' . config('app.url') . '/index.php?page=buku"</script>';
		}
	}

	if ($action == "hapus") {
		$id = $_GET['id'];
		Buku::delete($id);
		echo '<script>window.location="' . config('app.url') . '/index.php?page=buku&success=hapus-data"</script>';
	}
} else {
	echo '<script>window.location="' . config('app.url') . '/index.php"</script>';
}
