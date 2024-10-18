<?php
require_once BASE_PATH . '../model/User.php';
// $allMessages = Model::getAll("messages");
$allUsers = User::getRow("users",$_GET['id']);
// dd($allUsers);
// die;
// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_User");
require_once BASE_PATH . "../views/backend/users/EditUser.php";
?>