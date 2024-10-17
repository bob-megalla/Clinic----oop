<?php
require_once BASE_PATH . "../model/Doctor.php";
require_once BASE_PATH . "Session.php";
$doctor_id = $_GET['id'];
$doctor = Session::setSession("doctor_id",$doctor_id);
$allDoctors = Doctor::RightJoinTable(table1: "doctors",table2: "major",field1: "major_id",field2: "id",where:"WHERE doctors.id='$doctor_id'",limit:"LIMIT 1");
// dd($allDoctors);
// die;
// $allDoctors = Doctor::getRow(table_name:"doctors",id:"'$id'");


require_once BASE_PATH . "../views/frontend/store_appoint.php";
?>