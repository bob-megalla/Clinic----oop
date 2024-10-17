<?php 
require_once 'model.php';
Class News extends Model{

    protected static $table_name = "news";

    protected static $fillable = [
        "id",
    
    ];
    /////https://www.svgrepo.com/collection/hospital-medical-duotone-vectors/

    public function __construct(){
        $table_name = self::$table_name;
        $fillable = self::$fillable;
        $array_table_fillable = ["$table_name"=>$fillable];
        return dd($array_table_fillable);
    }

}