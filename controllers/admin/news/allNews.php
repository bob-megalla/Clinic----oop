<?php require_once BASE_PATH . '../model/Model.php' ?>

<?php
// $allMessages = Model::getAll("messages");
$allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/news.php";
?>