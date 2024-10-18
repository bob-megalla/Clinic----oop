<?php
require_once BASE_PATH . '../model/Doctor.php';
// $allMessages = Model::getAll("messages");
$allDoctors = Doctor::getRow("doctors",$_GET['id']);

// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/doctors/EditDoctor.php";
?>