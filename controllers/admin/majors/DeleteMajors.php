<?php
require_once BASE_PATH . "../model/Major.php";
require_once BASE_PATH . "../model/Doctor.php";
require_once BASE_PATH . "../model/Model.php";
require_once BASE_PATH . "Session.php";

$allMessages = Model::getAll("major", sort_by: "ORDER BY `id` DESC");
if (!isset($_GET['id'])) {
    header("Location: ?admin=allMajors");

} else {
    $id = $_GET['id'];
    // $selectedDoctor = Major::getRow("major",$id);
    ////////// FIRST WE GET ALL DOCTORS RELAITED TO SELECTED MAJOR
    $getDoctors = Doctor::getAll("doctors", where: "WHERE `major_id` = $id");
    ////////// FIRST WE GET IMAGE DOCTORS RELAITED TO SELECTED MAJOR AND DELETE IT
    foreach($getDoctors as $key=>$doc){
        $imagePath ="assets/img/doctors/" . $doc["img_doctor"];
        $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
        if(file_exists($imagePath)){
            $imageDoctor = Doctor::DeleteImage($imagePath);
        }
        // dd($imagePath);
    }
    ////////// DELETING ALL DOCTORS RELATIED TO MAJOR
    Doctor::DeleteRow("doctors", "WHERE `major_id` = $id");
    ////////// DELETE MAJOR IMAGE 
    $getMajor = Major::getAll("major", where: "WHERE `id` = $id");

    $imagePath ="assets/img/majors/" . $getMajor[0]["img_major"];


    $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
    if(file_exists($imagePath)){
        $imageDoctor = Major::DeleteImage($imagePath);
    }

    ////////// DELETE MAJOR ROW
    $major = Major::DeleteRow("major","WHERE `id` = $id");
    ////////// SAVING SESSION 
    Session::setSession("success", "Major And Related Doctors Deleted Successfully");
    ////////// REDIRECT ROUTE
    header("Location: ?admin=allMajors");

    // dd($getDoctors);
    // die;

}

?>