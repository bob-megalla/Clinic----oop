<?php
require_once BASE_PATH . '../model/Doctor.php';
// $allMessages = Model::getAll("messages");
$allNews = Doctor::getRow("news",$_GET['id']);
// dd($allNews);
// die;
// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/news/EditNews.php";
?>