<?php

class Query
{
    protected static $table = "";
    protected static $primaryKey = "id";

    public static function insert(array $data)
    {
        return DB::table(static::$table)->insert($data);
    }

    public static function count()
    {
        $dataCount = DB::table(static::$table)->select("count(*) as total")->first();

        if ($dataCount) {
            return (int)$dataCount['total'];
        } else {
            return 0;
        }
    }

    public static function insertGetId(array $data)
    {
        return DB::table(static::$table)->insertGetId($data);
    }

    public static function where($column, $operator, $value)
    {
        return DB::table(static::$table)->where($column, $operator, $value);
    }

    public static function updateByPk($id, $data)
    {
        return DB::table(static::$table)->where(static::$primaryKey, '=', $id)->update($data);
    }

    public static function find($id)
    {
        $data = DB::table(static::$table)->where(static::$primaryKey, "=", $id)->first();
        return $data;
    }

    public static function delete($id)
    {
        return DB::table(static::$table)->where(static::$primaryKey, "=", $id)->delete();
    }

    public static function truncate()
    {
        return DB::table(static::$table)->delete();
    }

    public static function all()
    {
        return DB::table(static::$table)->get();
    }
}
