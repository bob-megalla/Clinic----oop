<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/News.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validation();
    $validator->validate(
        [
            "img_link" => ["required", "min:3", "max:200"],
            "title_news" => ["required", "alpha", "min:3", "max:200"],
            "contact_news" => ["required", "alpha", "min:3", "max:200"],
            "published" => ["numeric"],
            ]
        );
        // die;

        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            $img_link = $data['img_link'];
            $title_news = $data['title_news'];            
            $contact_news = $data['contact_news'];
            $published = $data['published'];
            // dd($published);
            // die;
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new News();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table->InsertData($table_name,$fillable,[$img_link,$title_news,$contact_news,$published]);
            Validation::setSession("success",'News Added Successfully');
            header("Location: ?admin=allNews");
    } else {
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=AddNewNew");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
