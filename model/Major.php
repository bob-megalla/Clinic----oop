<?php 
require_once 'model.php';
Class Major extends Model{

    protected static $table_name = "major";

    protected static $fillable = [
        "name_major",
        "img_major"
    ];

    public function __construct(){
        $table_name = self::$table_name;
        $fillable = self::$fillable;
        $array_table_fillable = ["$table_name"=>$fillable];
        return $array_table_fillable;
    }

    public function getFillable(){
        return self::$fillable;
    }

    public function getTableName(){
        return self::$table_name;
    }



}