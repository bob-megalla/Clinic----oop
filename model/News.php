<?php 
require_once 'model.php';
Class News extends Model{

    protected static $table_name = "news";

    protected static $fillable = [
        "img_link",
        "title_news",
        "contact_news",
        "published",
    
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