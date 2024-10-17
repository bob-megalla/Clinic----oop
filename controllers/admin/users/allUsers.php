<?php require_once BASE_PATH . '../model/Model.php' ?>

<?php
// $allMessages = Model::getAll("messages");
$allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/users.php";
?>