<?php

include __DIR__ . "/../helpers/loaders.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

if (Authentication::isLoggedIn()) {
    if ($action == "tambah") {

        try {
            if ($name_foto = upload_file($_FILES['foto'])) {

                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $email = $_POST['email'];
                $kelas = $_POST['kelas'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $jenis_kelamin = $_POST['jenis_kelamin'];

                // data login
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];


                $id_anggota = Anggota::insertGetId([
                    "nama" => $nama,
                    "alamat" => $alamat,
                    "email" => $email,
                    "kelas" => $kelas,
                    "tanggal_lahir" => $tanggal_lahir,
                    "jk" => $jenis_kelamin,
                    "foto" => $name_foto,
                ]);

                User::insert([
                    "username" => $username,
                    "password" => $password,
                    "id_anggota" => $id_anggota,
                    "role" => $role,
                ]);


                echo '<script>window.location="' . config('app.url') . '/index.php?page=anggota&success=tambah-data"</script>';
            } else {
                echo '<script>alert("Masukan Gambar !");window.location="' . config('app.url') . '/index.php?page=anggota"</script>';
            }
        } catch (\Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");window.location="' . config('app.url') . '/index.php?page=anggota"</script>';
        }
    }

    if ($action == "edit") {

        $id  = $_GET['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];

        $kelas = $_POST['kelas'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];


        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];



        $data = [
            "nama" => $nama,
            "alamat" => $alamat,
            "email" => $email,
            "kelas" => $kelas,
            "tanggal_lahir" => $tanggal_lahir,
            "jk" => $jenis_kelamin
        ];

        try {
            $gambar = "";
            if (!isEmptyImage($_FILES['foto'])) {
                $gambar = upload_file($_FILES['foto']);

                $data['foto'] = $gambar;
            }
            $anggota = Anggota::updateByPk($id, $data);
            $user = User::where("id_anggota", "=", $id)->update([
                "username" => $username,
                "password" => $password,
                "role" => $role,
            ]);
            echo '<script>window.location="' . config('app.url') . '/index.php?page=anggota&success=edit-data"</script>';
        } catch (\Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");window.location="' . config('app.url') . '/index.php?page=anggota"</script>';
        }
    }

    if ($action == "hapus") {
        $id = $_GET['id'];
        Anggota::delete($id);
        User::where("id_anggota", "=", $id)->delete();
        echo '<script>window.location="' . config('app.url') . '/index.php?page=anggota&success=hapus-data"</script>';
    }
} else {
    echo '<script>window.location="' . config('app.url') . '/index.php"</script>';
}
