<?php
require_once BASE_PATH . "../model/BookedDoctor.php";
require_once BASE_PATH . "../model/Model.php";
$getBooked = $_GET['id'];
$selectedBooked = BookedDoctor::RightJoinTable("booked_doctor","doctors","doctor_id","id",limit:"LIMIT 1");
// dd($selectedBooked);
// die;
if($selectedBooked[0]['is_compeleted'] == "yes"){
    $conn = Model::getConn();
    $sql = "UPDATE `booked_doctor` SET `is_compeleted` = 'yes' WHERE id=$getBooked";
    // dd($sql);
    mysqli_query($conn,$sql);
 
}
// dd($selectedMessage);
// die;

require_once BASE_PATH . "../views/backend/booked/getNews.php";
?>

