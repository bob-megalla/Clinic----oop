<?php
require_once BASE_PATH . "../model/BookedDoctor.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("booked_doctor",sort_by:"ORDER BY `created_at` DESC");
if(!isset($_GET['id'])){
    header("Location: ?admin=allBooked");
   
}else{
    $id = $_GET['id'];
    $message = BookedDoctor::DeleteRow("booked_doctor","WHERE `id` = $id");
        Session::setSession("success","Booked Deleted Successfully");
        header("Location: ?admin=allBooked");
    
}

?>

