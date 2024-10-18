<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Major.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // die;
    $validator = new Validation();
    $validator->validate(
        [
            "name_major" => ["required", "alpha", "min:4", "max:200"],
            "img_major" => ["img"],
            ]
        );

        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            $name_major = $data['name_major'];            
            $img_major = $data['img_major'];
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new Major();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            ////////// ADD IMAGE TO PATH FUNCTION ADD IMAGE
            $imgNewName = $data_table->AddNewImage('img_major',$_FILES,"assets/img/majors/");
        ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table->InsertData($table_name,$fillable,[$name_major,$imgNewName]);
        Validation::setSession("success",'Major Sent Successfully');
        header("Location: ?admin=allMajors");
    } else {
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=AddNewMajor");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
