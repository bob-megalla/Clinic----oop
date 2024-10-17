<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Messages.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validation();
    $validator->validate(
        [
            "name" => ["required", "alpha", "min:3", "max:200"],
            "phone" => ["required", "numeric", "min:11", "max:11"],
            "email" => ["required", "email", "max:255"],
            "subject" => ["required", "string", "min:3"],
            "message" => ["required", "string", "max:500"],
        ]
    );

    if (empty($validator->getErrors())) {
        ////////// VALIDATE INPUT DATA
        $data = $validator->getData();
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table = new Messages();
        ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
        $table_name = $data_table->getTableName();
        $fillable = $data_table->getFillable();
        ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
        $data_table->InsertData($table_name,$fillable,[$name,$phone,$email,$subject,$message]);
        Validation::setSession("success",'Messages Sent Successfully');
        // dd($data_table);
        // die;
        header("Location: ?page=message");
    } else {
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?page=message");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
