<?php

$conn = mysqli_connect("localhost","root","","clinic"); 

class Functions{

   public function redirect($url){
        header("Location: ".$url);
        die;
    }
    public function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    
    // database functions
    
    public function getall($table_name){
        global $conn;
        $sql = " SELECT * FROM `$table_name` ";
        return mysqli_query($conn,$sql);
    }
    public function id($table_name,$id,$coulmn){
        global $conn;
        $sql = "SELECT * FROM `$table_name` WHERE $coulmn=$id";
       return mysqli_query($conn,$sql);
    }
    
    // public function join($table1,$table2,$coulmn,$id){
    //     global $conn;
    //     $sql = " SELECT `$table1`.*, `$coulmn` FROM `$table1` JOIN `$table2` ON `$table1`.`$coulmn`=$id   ";
    //     return mysqli_query($conn,$sql);
    // }

    // errors functions

    public function trim($str) {
        return trim(htmlspecialchars($str));
    }
    public function empty($str) {
        return (empty($str))? true : false;
    }
    public function strlen($input,$num,$num2){
        return (strlen($input) < $num || strlen($input) > $num2)? true : false;
    }
    public function filterEmail($email) {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}