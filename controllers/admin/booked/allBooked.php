<?php require_once BASE_PATH . '../model/Model.php' ?>

<?php
// $allDoctors = Model::RightJoinTable(table1: "doctors",table2: "major",field1: "major_id",field2: "id",where:"WHERE `name_doctor` IS NOT NULL");

$allBooked = Model::RightJoinTable("booked_doctor","doctors","doctor_id","id",where:"WHERE `name` IS NOT NULL",sort_by:"ORDER BY `created_at` DESC");
// dd($allBooked);
// die;
require_once BASE_PATH . "../views/backend/booked.php";
?>