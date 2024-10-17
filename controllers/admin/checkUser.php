<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validation();
    $validator->validate(
        [
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:3"],
        ]
    );

    if (empty($validator->getErrors())) {
        $data = $validator->getData();
        $email = $data['email'];
        $password = $data['password'];
        $hashed_password = hash('md5', $password);
        $isUser = Model::getUser("users", $email, $hashed_password);
        if ($isUser != null) {
            Validation::setSession("user_id", $isUser['id']);
            Validation::setSession("name", $isUser['name']);
            Validation::setSession("phone", $isUser['phone']);
            Validation::setSession("email", $isUser['email']);
            
            // dd($isUser);
            // die;
            header("Location: ?admin=dashboard");
            // header("Location: ?admin=dashboard");   
        } else {
            $validator->addPrivateError("errors", "Wrong Email OR Password !!");
            Validation::setSession("errors", $validator->getErrors());
            header("Location: ?page=login");
        }
    //  dd($isUser);
    } else {
        // var_dump($validator->getErrors());
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?page=login");
    }

} else {
    require_once BASE_PATH . '../views/errors/404.php';

}