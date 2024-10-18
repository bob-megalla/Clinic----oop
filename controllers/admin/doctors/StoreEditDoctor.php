<?php require_once BASE_PATH . '../model/Validation.php' ?>
<?php require_once BASE_PATH . '../model/Doctor.php' ?>
<?php require_once BASE_PATH . '../model/Model.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $oldPhotoName = Doctor::getRow("doctors",$id);
    $validator = new Validation();
    $validator->validate(
        [
            "doctorName" => ["required", "alpha", "min:3", "max:200"],
            "major_id" => ["required"],
            // "DoctorImage" => ["img"],
            ]
        );
        
        
      
        if (empty($validator->getErrors())) {
            ////////// VALIDATE INPUT DATA
            $data = $validator->getData();
            $doctorName = $data['doctorName'];
            $major_id = $data['major_id'];            
            $DoctorImage = $data['DoctorImage'];
            ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
            $data_table = new Doctor();
            ////////// GETTING DATA FROM MODEL BASED ON TABLE NAME AND FILLABLE ARRAY
            $table_name = $data_table->getTableName();
            $fillable = $data_table->getFillable();
            // dd($_FILES);
            // die;
            if(!empty($DoctorImage)){
                ////////// UNLINK OLD IMAGE 
                $data_table->DeleteImage( "assets/img/doctors/" . $oldPhotoName['img_doctor']);
                // dd($oldPhotoName['img_doctor']);
                // die;
                //////// ADD IMAGE TO PATH FUNCTION ADD IMAGE
                $imgNewName = $data_table->AddNewImage('DoctorImage',$_FILES,"assets/img/doctors/");
                ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
                $data_table->EditData($table_name,$fillable,[$doctorName,$major_id,$imgNewName],$id);
            }else{

                // die;
                   ////////// INSERT DATA INPUT IN DATABASE WITH OOP FUNCTION
                   $data_table->EditData($table_name,$fillable,[$doctorName,$major_id,$oldPhotoName['img_doctor']],$id);
            }
            Validation::setSession("success",'Doctor Sent Successfully');
            header("Location: ?admin=allDoctors");
    } else {
        $allDoctors = Doctor::getRow("doctors",$_GET['id']);
        Validation::setSession("errors", $validator->getErrors());
        header("Location: ?admin=EditDoctor&id=$id");
    }


} else {
    require_once BASE_PATH . '../views/errors/404.php';

}
