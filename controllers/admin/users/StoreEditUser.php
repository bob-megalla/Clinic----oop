<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/User.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    // dd($id);

    $oldPass = User::getRow("users",$id);
    $validator = new Validation();
    $validator->validate(
        [
            "name" => ["required", "alpha", "min:3", "max:200"],
            "phone" => ["required", "numeric", "min:11", "max:11"],
            "email" => ["required", "email"],
            // "password" => ["required"],
            // "DoctorImage" => ["img"],
            ]
        );
        
        
        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            // dd($data);
            // die;
            $name = $data['name'];
            $phone = $data['phone'];            
            $email = $data['email'];
            $password = $data['password'];
            $hashed_password = hash('md5', $password);
            // dd([$name,$phone,$email,$password,$hashed_password]);
            // die;
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new User();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            if(!empty($password)){
                // dd($oldPass['password']);
                // die;
                $test = $data_table->EditData($table_name,$fillable,["name"=>$name,"phone"=>$phone,"email"=>$email,"password"=>$hashed_password],$id);
                Validation::setSession("success",'Doctor Sent Successfully');
                header("Location: ?admin=allUsers");
                // dd($test);
                // die;
            } else{
                // die;
                   $data_table->EditData($table_name,$fillable,["name"=>$name,"phone"=>$phone,"email"=>$email,"password"=>$oldPass['password']],$id);
                   Validation::setSession("success",'Doctor Sent Successfully');
                //    Validation::destroySession();

                   header("Location: ?admin=allUsers");
            }
    } else {
        // die;
        $allDoctors = User::getRow("users",$_GET['id']);
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=EditUser&id=$id");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
