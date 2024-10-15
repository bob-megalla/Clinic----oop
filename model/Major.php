<?php 
require_once 'model.php';
Class Major extends Model{

    protected static $table_name = "major";

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