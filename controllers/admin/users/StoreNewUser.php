<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/User.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validation();
    $validator->validate(
        [
            "name" => ["required", "alpha", "min:3", "max:200"],
            "phone" => ["required","numeric","min:11","max:11"],
            "email" => ["required","email"],
            "password" => ["required"],
            ]
        );

        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            $name = $data['name'];
            $phone = $data['phone'];            
            $email = $data['email'];
            $password = $data['password'];
            $hashed_password = hash('md5', $password);
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new User();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table->InsertData($table_name,$fillable,[$name,$phone,$email,$hashed_password]);
            Validation::setSession("success",'User Added Successfully');
            header("Location: ?admin=allUsers");
    } else {
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=AddNewUser");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
