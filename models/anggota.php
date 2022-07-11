<?php

class Anggota extends Query
{
    protected static $table = "data_anggota";


    public static function getAnggotaBaru()
    {
        return DB::table(static::$table)->orderBy("id", "desc")->take(5)->get();
    }

    public static function allWithRole()
    {
        return DB::table(static::$table)->select([
            'data_anggota.*',
            'users.role'
        ])->join("users", 'users.id_anggota', 'data_anggota.id')->get();
    }
}
