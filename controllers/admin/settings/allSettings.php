<?php require_once BASE_PATH . '../model/Model.php' ?>

<?php
$allSettings = Model::getAll("settings",limit:"LIMIT 1");
// DD($allSettings);
// die;
// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/settings.php";
?>