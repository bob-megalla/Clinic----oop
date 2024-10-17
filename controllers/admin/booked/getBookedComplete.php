<?php
require_once BASE_PATH . "../model/BookedDoctor.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";
$getBooked = $_GET['id'];
$selectedBooked = BookedDoctor::getRow("booked_doctor",$getBooked);
// dd($selectedBooked);
// die;
if($selectedBooked['is_compeleted'] == "no"){
    $conn = Model::getConn();
    $sql = "UPDATE `booked_doctor` SET `is_compeleted` = 'yes' WHERE id=$getBooked";
    // dd($sql);
    // die;
    mysqli_query($conn,$sql);
    Session::setSession('success',"Completed Successfully");
    
 
}
// dd($selectedMessage);
// die;

require_once BASE_PATH . "../views/backend/booked/getBooked.php";
?>

