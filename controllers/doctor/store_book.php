<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php require_once BASE_PATH . '../model/BookedDoctor.php' ?>
<?php
$doctor_id = Validation::getSession("doctor_id");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validation();
    $validator->validate(
        [
            "name" => ["required", "alpha", "min:3", "max:200"],
            "phone" => ["required", "numeric", "min:11", "max:11"],
            "email" => ["required", "email", "max:255"],
        ]
    );
    
    if (empty($validator->getErrors())) {
       
        $data = $validator->getData();
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $id_doctor = $doctor_id;
  ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table = new BookedDoctor();
        ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
        $table_name = $data_table->getTableName();
        $fillable = $data_table->getFillable();
        ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table->InsertData($table_name,$fillable,[$name,$phone,$email,$id_doctor]);
        Validation::setSession("success",'Booked Sent Successfully');
        // $sql = "INSERT INTO `booked_doctor` (`name`,`phone`,`email`,`doctor_id`) VALUES ('$name','$phone','$email','$doctor_id')";
        // $conn = Model::getConn();
        // mysqli_query($conn, $sql);
        header("Location: ?page=store_appoint&id=$doctor_id");
    } else {
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?page=store_appoint&id=$doctor_id");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
