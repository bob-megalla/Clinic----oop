<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Settings.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    // dd($id);

    $oldSettings = Settings::getSettings("settings");
    $validator = new Validation();
    $validator->validate(
        [
            "site_name" => ["required", "min:3", "max:200"],
            //  "question_img" => ["img"],
            "question_home" => ["required", "min:3"],
            "question_answer" => ["required", "min:3"],
            "footer_title" => ["required", "min:3"],
            "footer_contact" => ["required", "min:3",],
            "footer_app_title" => ["required", "min:3"],
            "footer_app_contact" => ["required", "min:3"],
            // "footer_app_img" => ["img"],
            // "password" => ["required"],
            // "DoctorImage" => ["img"],
        ]
    );


    if (empty($validator->getErrors())) {
        ////////// VALIDATE INPUT DATA
        $data = $validator->getData();
        // dd($oldSettings);
        // die;
        $site_name = $data['site_name'];
        $question_img = $data['question_img'];
        $question_home = $data['question_home'];
        $question_answer = $data['question_answer'];
        $footer_title = $data['footer_title'];
        $footer_contact = $data['footer_contact'];
        $footer_app_title = $data['footer_app_title'];
        // dd($footer_app_title);
        $footer_app_contact = $data['footer_app_contact'];
        $footer_app_img = $data['footer_app_img'];

        // die;
        ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table = new Settings();
        ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
        $table_name = $data_table->getTableName();
        $fillable = $data_table->getFillable();
        // dd($question_img);
        // echo "testtt";
        // die;
        // echo "testtttttttt";
        // dd(empty($question_img));
        if (!empty($question_img)) {
            // die;
            ////////// UNLINK OLD IMAGE 
             $data_table->DeleteImage( "assets/img/" . $oldSettings["question_img"]);
            // dd($oldSettings['footer_app_img']);
            // die;
            //////// ADD IMAGE TO PATH FUNCTION ADD IMAGE
             $imgNewName = $data_table->AddNewImage('question_img', $_FILES, "assets/img/");
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table->EditData($table_name,$fillable,[$site_name,$question_home,$question_answer,$footer_title,$footer_contact,$footer_app_title,$footer_app_contact,$imgNewName,$oldSettings["footer_app_img"]],$id);
            Validation::setSession("success",'Settings Updated Successfully');
            header("Location: ?admin=WebsiteSettings");
        }else if (!empty($footer_app_img)) {
            // die;
            ////////// UNLINK OLD IMAGE 
             $data_table->DeleteImage( "assets/img/" . $oldSettings["footer_app_img"]);
            // dd($oldSettings['footer_app_img']);
            // die;
            //////// ADD IMAGE TO PATH FUNCTION ADD IMAGE
             $imgNewName = $data_table->AddNewImage('footer_app_img', $_FILES, "assets/img/");
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table->EditData($table_name,$fillable,[$site_name,$question_home,$question_answer,$footer_title,$footer_contact,$footer_app_title,$footer_app_contact,$oldSettings["question_img"],$imgNewName],$id);
            Validation::setSession("success",'Settings Updated Successfully');
            header("Location: ?admin=WebsiteSettings");
        }
        else{

            // die;
               ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
               $data_table->EditData($table_name,$fillable,[$site_name,$question_home,$question_answer,$footer_title,$footer_contact,$footer_app_title,$footer_app_contact,$oldSettings["question_img"],$oldSettings["footer_app_img"]],$id);
               Validation::setSession("success",'Settings Updated Successfully');
                   header("Location: ?admin=WebsiteSettings");
        }
    
    } else {
        // die;
        $allSettings = Model::getSettings("settings");
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=WebsiteSettings");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
