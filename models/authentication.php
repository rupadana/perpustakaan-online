<?php

class Authentication
{

    public static function login($username, $password)
    {
        // $pass = md5($password);
        $data = DB::table("users")->join("data_anggota", "data_anggota.id", "users.id_anggota")->where("users.username", "=", "$username")->where("users.password", "=", "$password")->first();

        if ($data) {
            $_SESSION["admin"] = $data;
            return true;
        }

        return false;
    }

    public static function isLoggedIn()
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
            return true;
        }

        return false;
    }
}
