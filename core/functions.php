<?php 
define("BASE_PATH",__DIR__ . DIRECTORY_SEPARATOR);
define("BASE_URL","127.0.0.1/BackEnd324/clinic/Clinic----oop/");

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    // die;
}; /////// dd Function to Check Data


function url($path){
    return $path;
    // return BASE_URL . $path;
} /////// URL Function to Find URL


function activeLink($active_id,$id){
    if($active_id == $id){
        return 'active-link';
    }
    return '';
}
function activeAdminLink($active_id,$id){
    if($active_id == $id){
        return 'active';
    }
    return '';
}