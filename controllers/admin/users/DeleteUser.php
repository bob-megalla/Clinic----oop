<?php
require_once BASE_PATH . "../model/User.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("doctors",sort_by:"ORDER BY `id` DESC");
if(!isset($_GET['id'])){
    header("Location: ?admin=allUsers");
   
}else{
    $id = $_GET['id'];
    // dd($id);
    // die;
   
        $message = User::DeleteRow("users","WHERE `id` = $id");
        Session::setSession("success","User Deleted Successfully");
        header("Location: ?admin=allUsers");
    
}

?>

