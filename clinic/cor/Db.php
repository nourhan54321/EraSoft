<?php 


class Db{
  public $conn;
  public $sql;
  public function connection()
  {
    return  mysqli_connect("localhost", "root", "", "clinic");
  }
  public function fetchData($table_name)
  {
    $sql ="SELECT * FROM $table_name GROUP BY Id ";
    return $sql;
  } 
  public function getDetails($table_name, $id){ 
    $sql = "SELECT doctors.* , majors.name , majors.id AS cat_id FROM `$table_name` 
    INNER JOIN `majors` ON `majors`.`id` = `doctors`.`department` WHERE doctor.department=$id";
    return $sql;


}
 public function getJoin(){
  if (isset($_GET['majors']) && is_numeric($_GET['majors'])) {
    $id = $_GET['majors'];
    // dd($id);
    $sql = "SELECT `doctors`.*,`majors`.`id` AS cat_id ,`majors`.`name`
    FROM  `doctors` WHERE `doctors`.`majors_id`='$id'
    INNER JOIN `majors` ON `majors`.`id` = `doctors`.`majors_id`";
}

}

}


 function getDoctorDetails($table_name, $id)
{
  global $conn;
  $sql = "SELECT doctors.* , majors.name , doctor.id AS cat_id FROM `$table_name` 
  INNER JOIN `category` ON `category`.`id` = `product`.`category_id` WHERE product.id=$id";
  return mysqli_fetch_assoc(mysqli_query($conn, $sql));
}
