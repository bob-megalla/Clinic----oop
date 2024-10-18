<?php 
abstract class Model{
    
    protected static $conn;
    protected static function conn(){
        $conn = mysqli_connect("localhost","root","","clinic");
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }
        return $conn;
    } 
    public static function getSettings($table_name){
        
        $conn = self::conn();
        $sql = "SELECT * FROM `$table_name`  LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function getAll($table_name,$fileds = "*",$limit='',$where='',$sort_by = ''){
        $conn = self::conn();
        $sql = "SELECT $fileds FROM `$table_name` $where $sort_by $limit";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function InnerJoinTable($table1,$table2,$field1,$field2,$as_name='',$field3='',$where='',$limit=''){
        $conn = self::conn();
        $sql = "SELECT $table1.*,$table2.$field2,$table2.$field3 AS $table2$field3,$table2.name AS $as_name FROM `$table1` 
                INNER JOIN `$table2` 
                ON `$table1`.$field1 = `$table2`.`$field2`
                $limit
                $where 
        ";
      
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function LeftJoinTable($table1,$table2,$field1,$field2,$as_name='',$field3='',$where='',$limit=''){
        $conn = self::conn();
        $sql = "SELECT $table1.*,$table2.$field2,$table2.$field3 AS $table2$field3,$table2.name AS $as_name FROM `$table1` 
                LEFT JOIN `$table2` 
                ON `$table1`.$field1 = `$table2`.`$field2`
                $limit
                $where 
        ";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function RightJoinTable($table1,$table2,$field1,$field2,$where='',$limit='',$sort_by=''){
        $conn = self::conn();
        $sql = "SELECT $table1.*,$table2.*,$table2.id As $table2 FROM `$table1` 
                RIGHT JOIN `$table2` 
                ON `$table1`.$field1 = `$table2`.`$field2`
                $where 
                $sort_by
                $limit
        ";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        } 
        return $rows;
    }

    public static function getRow($table_name,$id){
        $conn = self::conn();
        $sql = "SELECT * FROM `$table_name` WHERE `id`='$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function getUser($table_name,$username,$password){
        $conn = self::conn();
        $sql = "SELECT * FROM `$table_name` WHERE `email`='$username' AND  `password` = '$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function getConn(){
        $conn = self::conn();
        return $conn ?? "";
    }

    public static function InsertData($table_name,$fillable="",$values = []){
        $fillable = implode("`,`",$fillable);
        $fillable="`$fillable`";
        $values = implode("','",$values);
        $values="'$values'";
        $sql = "INSERT INTO `$table_name` ($fillable) VALUES ($values)";
        $conn = Model::getConn();
        mysqli_query($conn, $sql);
     
    }

    public static function EditData($table_name,$fillable=[],$values = [],$id){
        // dd($values);
        foreach($fillable as $index=>$fill){
            foreach($values as $key =>$val){
                // die;
                // dd($index);
                $sql[] = "`$fill` = '$values[$index]'";
                break;
            }
            
        }
        // dd($sql);
        $sql = implode(",",$sql);
        $sql = "UPDATE `$table_name` SET $sql WHERE id=$id";
        // dd($sql);
        // die;
        $conn = Model::getConn();
        mysqli_query($conn, $sql);
     
    }

    public static function DeleteRow($table_name,$where){
        $sql = "DELETE FROM `$table_name` $where";
        $conn = Model::getConn();
        mysqli_query($conn, $sql);
    }

    public static function DeleteImage($fileName){
     
      if(file_exists( $fileName)){

          unlink($fileName);
          return true;
      }else{
        return false;
      }
    }

    public static function AddNewImage($fileName,$file,$folderPath = ""){
        // dd($_FILES);
        // die;
        $tmp = $file[$fileName]["tmp_name"];
        $fullPath = $file[$fileName]["full_path"];
        $filename = $file[$fileName]["name"];
        $type = $file[$fileName]['type'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadImageName = date('YmdHis') .".". $ext;
        $uploadfilePath =  $folderPath . $uploadImageName ;
        move_uploaded_file($tmp,$uploadfilePath);
        return $uploadImageName;
    }

  
}