<?php

include __DIR__ . "/../helpers/loaders.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

if (Authentication::isLoggedIn()) {
    if ($action == "tambah") {

        try {


            $id_anggota = $_POST['id_anggota'];
            $keperluan = $_POST['keperluan'];
            $mencari = $_POST['mencari'];
            $saran = $_POST['saran'];
            $tgl_kunjung = $_POST['tgl_kunjung'];




            Pengunjung::insert([
                'id_anggota' => $id_anggota,
                'keperluan' => $keperluan,
                'cari' => $mencari,
                'saran' => $saran,
                'tgl_kunjung' => $tgl_kunjung,
            ]);



            if (isset($_GET['from'])) {
                if ($_GET['from'] == 'dashboard') {
                    echo '<script>window.location="' . config('app.url') . '/index.php?success=tambah-data"</script>';

                    return;
                }
            }

            echo '<script>window.location="' . config('app.url') . '/index.php?page=pengunjung&success=tambah-data"</script>';
        } catch (\Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");window.location="' . config('app.url') . '/index.php?page=pengunjung"</script>';
        }
    }


    if ($action == "hapus") {
        $id = $_GET['id'];
        Pengunjung::delete($id);
        echo '<script>window.location="' . config('app.url') . '/index.php?page=pengunjung&success=hapus-data"</script>';
    }
} else {
    echo '<script>window.location="' . config('app.url') . '/index.php"</script>';
}
