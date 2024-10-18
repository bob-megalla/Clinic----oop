<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Major.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // die;
    $id = $_POST['id'];
    $oldPhotoName = Major::getRow("major", $id);
    $validator = new Validation();
    $validator->validate(
        [
            "name_major" => ["required", "alpha", "min:3", "max:200"],

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
        // dd($fillable);
        // die;

        if (!empty($img_major)) {
            // dd($data);
            // die;
            $validator->validate(
                [
                    "img_major" => ["img"],
                ]
            );
            // echo 'testtt';
            // die;
            if (!empty($validator->getErrors())) {
                $allMajors = Major::getRow("major", $_GET['id']);
                Validation::setSession("errors", $validator->getErrors());
                header("Location: ?admin=EditMajor&id=$id");
            } 
            else {
                ////////// UNLINK OLD IMAGE 
                $test = $data_table->DeleteImage("assets/img/majors/" . $oldPhotoName['img_major']);
                // dd($test);
                // die;
                //////// ADD IMAGE TO PATH FUNCTION ADD IMAGE
                $imgNewName = $data_table->AddNewImage('img_major', $_FILES, "assets/img/majors/");
                ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
                $data_table->EditData($table_name, $fillable, [$name_major, $imgNewName ], $id);
                Validation::setSession("success", 'Major Sent Successfully');
                header("Location: ?admin=allMajors");
            }
        } else {
            $data_table->EditData($table_name, $fillable, [$name_major, $oldPhotoName['img_major']], $id);
                 Validation::setSession("success", 'Major Sent Successfully');
                header("Location: ?admin=allMajors");
        }


    } else {
        $allMajors = Major::getRow("major", $_GET['id']);
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=EditMajor&id=$id");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
