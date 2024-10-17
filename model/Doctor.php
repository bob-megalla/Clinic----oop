<?php 
require_once 'model.php';
Class Doctor extends Model{

    protected static $table_name = "doctors";

    protected static $fillable = [
        "id",
        "name_doctor",
        "major_id",
        "img_doctor"
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