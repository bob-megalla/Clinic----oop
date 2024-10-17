<?php
require_once BASE_PATH . "../model/Messages.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("messages",sort_by:"ORDER BY `created_at` DESC");
if(!isset($_GET['id'])){
    header("Location: ?admin=allMessages");
   
}else{
    $id = $_GET['id'];
    $message = Messages::DeleteRow("messages","WHERE `id` = $id");
        Session::setSession("success","Message Deleted Successfully");
        header("Location: ?admin=allMessages");
    
}

?>

