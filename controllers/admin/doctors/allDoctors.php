<?php require_once BASE_PATH . '../model/Model.php' ?>

<?php
// $allMessages = Model::getAll("messages");
$allDoctors = Model::RightJoinTable(table1: "doctors",table2: "major",field1: "major_id",field2: "id",where:"WHERE `name_doctor` IS NOT NULL");
// $allMajors = Model::getAll("major");
// $allUsers = Model::getAll("users");
// $allNews = Model::getAll("news");
// $allBooked = Model::getAll("booked_doctor");
require_once BASE_PATH . "../views/backend/doctors.php";
?>