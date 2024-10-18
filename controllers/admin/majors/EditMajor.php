<?php
require_once BASE_PATH . '../model/Major.php';
// die;
// $allMessages = Model::getAll("messages");
$allMajors = Major::getRow("major",$_GET['id']);
// dd($allMajors);
// die;
// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/majors/EditMajor.php";
?>