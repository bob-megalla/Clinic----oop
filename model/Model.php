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
    //    dd($sql);
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
        dd($sql);
        // die;
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
        dd($sql);
        // die;
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function RightJoinTable($table1,$table2,$field1,$field2,$where='',$limit=''){
        $conn = self::conn();
        $sql = "SELECT $table1.*,$table2.*,$table2.id As $table2   FROM `$table1` 
                RIGHT JOIN `$table2` 
                ON `$table1`.$field1 = `$table2`.`$field2`
                $where 
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
        // dd($result);
        // die;
        return mysqli_fetch_assoc($result);
    }

  
}