<?php 
require_once 'model.php';
Class Doctor extends Model{

    protected static $table_name = "doctors";

    protected static $fillable = [
        "id",
    
    ];



}