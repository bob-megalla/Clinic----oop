<?php 
require_once 'model.php';
Class Settings extends Model{

    protected static $table_name = "Settings";

    protected static $fillable = [
        "id",
        "site_name",
        "question_img",
        "question_home",
        "question_answer",
        "footer_title",
        "footer_contact",
    ];

  



}