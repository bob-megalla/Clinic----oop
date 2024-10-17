<?php
require_once BASE_PATH . "../model/User.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("news",sort_by:"ORDER BY `id` DESC");
if(!isset($_GET['id'])){
    header("Location: ?admin=allNews");
   
}else{
    $id = $_GET['id'];
    // dd($id);
    // die;
   
        $message = User::DeleteRow("news","WHERE `id` = $id");
        Session::setSession("success","News Deleted Successfully");
        header("Location: ?admin=allNews");
    
}

?>

