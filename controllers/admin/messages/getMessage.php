<?php
require_once BASE_PATH . "../model/Messages.php";
require_once BASE_PATH . "../model/Model.php";
$getMessage = $_GET['id'];
// dd($getMessage);
// die;
$selectedMessage = Messages::getRow("messages",$getMessage);
if($selectedMessage['is_readed'] == 0){
    $conn = Model::getConn();
    $sql = "UPDATE `messages` SET `is_readed` = 1 WHERE id=$getMessage";
    // dd($sql);
    mysqli_query($conn,$sql);
 
}
// dd($selectedMessage);
// die;

require_once BASE_PATH . "../views/backend/messages/getMessage.php";
?>

