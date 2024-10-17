<?php
require_once BASE_PATH . "../model/Doctor.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("doctors",sort_by:"ORDER BY `id` DESC");
if(!isset($_GET['id'])){
    header("Location: ?admin=allDoctors");
   
}else{
    $id = $_GET['id'];
    $selectedDoctor = Doctor::getRow("doctors",$id);
    $imagePath ="assets/img/doctors/" . $selectedDoctor["img_doctor"];
    $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
    if(file_exists($imagePath)){
        $imageDoctor = Doctor::DeleteImage($imagePath);

    }
    // dd(file_exists($imagePath));
    // die;
        $message = Doctor::DeleteRow("doctors","WHERE `id` = $id");
        Session::setSession("success","Doctor Deleted Successfully");
        header("Location: ?admin=allDoctors");
    
}

?>

