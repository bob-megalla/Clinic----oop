

<?php
require_once BASE_PATH . "../model/Doctor.php";
$doctor_id = $_GET['doctor_id'];
// dd($doctor_id);
// die;
$allDoctors = Doctor::RightJoinTable(table1: "major",table2: "doctors",field1: "id",field2: "major_id",where:"WHERE doctors.major_id='$doctor_id'");

require_once BASE_PATH . "../views/frontend/getDoctors.php";
?>
