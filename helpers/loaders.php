<?php
include __DIR__ . "/../functions/index.php";
include __DIR__ . "/../models/index.php";

if (!function_exists("config")) {
    function config($arg)
    {

        $cfg = require(__DIR__ .  "/load_config.php");
        $args = explode(".", $arg);

        $data = "";

        try {
            foreach ($args as $key => $v) {
                if ($data != '') {
                    $data = $data[$v];
                } else {
                    $data = $cfg[$v];
                }
            }
        } catch (\Throwable $th) {
            $data = "";
        }

        return $data;
    }
}

if (!function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }
}


if (!function_exists("upload_file")) {
    function upload_file($file)
    {
        set_time_limit(0);
        $allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png");

        if ($file["error"] > 0) {
            throw new Exception("Terdapat error pada file");
        } elseif (!in_array($file["type"], $allowedImageType)) {
            throw new Exception("Hanya dapat upload gambar dengan extensi JPG, PNG dan GIF", 1);
        } elseif (round($file["size"] / 1024) > 4096) {
            throw new Exception("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB", 1);
        } else {
            $dir = __DIR__ . "/../assets/upload/";

            $tmp_name = $file['tmp_name'];
            $name = time() . basename($file['name']);
            if (move_uploaded_file($tmp_name, $dir . $name)) {
                return "/assets/upload/" . $name;
            }
        }

        return false;
    }
}


if (!function_exists("isEmptyImage")) {
    function isEmptyImage($file)
    {
        if (empty($file['name'])) {
            return true;
        }
        return false;
    }
}

if (!function_exists("isSelected")) {
    function isSelected($key, $value)
    {
        if ($key == $value) echo "selected";
    }
}

if (!function_exists('getSuccessMessage')) {
    function getSuccessMessage($key)
    {
        switch ($key) {
            case 'hapus-data':
                echo "Hapus data berhasil";
                break;

            case 'tambah-data':
                echo 'Tambah data berhasil';
                break;

            case 'edit-data':
                echo 'Edit data berhasil';
                break;


            default:
                echo "Pesan tidak ditemukan";
                break;
        }
    }
}
