<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/News.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $oldPhotoName = News::getRow("news",$id);
    $validator = new Validation();
    $validator->validate(
        [
            "img_link" => ["required", "min:3"],
            "title_news" => ["required",  "min:3", "max:200"],
            "contact_news" => ["required",  "min:3", "max:200"],
            // "published" => ["required"],
            // "DoctorImage" => ["img"],
            ]
        );
        
        // dd($validator->getErrors());
        // die;
        
      
        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            $img_link = $data['img_link'];
            $title_news = $data['title_news'];            
            $contact_news = $data['contact_news'];
            $published = $data['published'];
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new News();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            // dd($_FILES);
            // die;
            $data_table->EditData($table_name,$fillable,[$img_link,$title_news,$contact_news,$published],$id);

            Validation::setSession("success",'Updated Sent Successfully');
            header("Location: ?admin=allNews");
    } else {
        $allDoctors = News::getRow("doctors",$_GET['id']);
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=EditNews&id=$id");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
