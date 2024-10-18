<?php 
require_once 'model.php';
Class Settings extends Model{

    protected static $table_name = "Settings";

    protected static $fillable = [
        "site_name",
        "question_home",
        "question_answer",
        "footer_title",
        "footer_contact",
        "footer_app_title",
        "footer_app_contact",
        "question_img",
        "footer_app_img",
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