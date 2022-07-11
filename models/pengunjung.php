<?php

class Pengunjung extends Query
{
    protected static $table = "pengunjung";
    protected static $primaryKey = "id";


    public static function allWithAnggota()
    {
        return DB::table(self::$table)->select([
            "pengunjung.*",
            "data_anggota.nama",
            "data_anggota.kelas",
        ])->join("data_anggota", "data_anggota.id", "pengunjung.id_anggota")->get();
    }

    public static function getPengunjungBaru()
    {
        return DB::table(self::$table)->select([
            "pengunjung.*",
            "data_anggota.nama",
            "data_anggota.kelas",
            "data_anggota.foto",
        ])->join("data_anggota", "data_anggota.id", "pengunjung.id_anggota")->orderBy("pengunjung.id", 'desc')->take(5)->get();
    }
}
