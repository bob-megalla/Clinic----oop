<?php
require_once BASE_PATH . "../model/BookedDoctor.php";
require_once BASE_PATH . "../model/Model.php";
$getBooked = $_GET['id'];
$selectedBooked = BookedDoctor::getRow("booked_doctor",$getBooked);
// dd($selectedBooked);
// die;
if($selectedBooked['is_readed'] == 0){
    $conn = Model::getConn();
    $sql = "UPDATE `booked_doctor` SET `is_readed` = 1 WHERE id=$getBooked";
    // dd($sql);
    // die;
    mysqli_query($conn,$sql);
 
}
// dd($selectedMessage);
// die;

require_once BASE_PATH . "../views/backend/booked/getBooked.php";
?>

