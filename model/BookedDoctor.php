<?php 
require_once 'model.php';
Class BookedDoctor extends Model{

    protected static $table_name = "booked_doctor";

    protected static $fillable = [
        "name" =>"name",
        "phone" =>"phone",
        "email" =>"email",
        "doctor_id" =>"doctor_id"
    ];

    public function __construct(){
        $table_name = self::getTableName();
        $fillable = self::getFillable();
        $array_table_fillable = [$table_name=>$fillable];
        // dd($array_table_fillable);
        return $array_table_fillable;
    }

    public function getFillable(){
        return self::$fillable;
    }

    public function getTableName(){
        return self::$table_name;
    }

  



}