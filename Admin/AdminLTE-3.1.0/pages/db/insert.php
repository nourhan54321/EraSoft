<?php
require_once('connection.php');
if(isset($_GET['appoint'])){
$obj = new Users();
    $name = $_GET['fullname'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $phone = $_GET['phone'];
    // Validate the input
    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill in all fields");
    }

    // Call the AddUsser method and pass the input
    if (!$obj->AddUser($name, $email, $password,$phone)) {
        echo 'nooo';
        die("Failed to add user: ");
    }
   
    // Redirect back to the users page
    header('Location: ../../users.php');
    exit;
}
elseif(isset($_GET['Time'])){
    $obj = new Appointment();
        $name = $_GET['fullname'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $doctor=$_GET['doctor'];
    
        // Validate the input
        if (empty($name) || empty($email) || empty($phone)) {
            die("Please fill in all fields");
        }
    
        // Call the AddUsser method and pass the input
        if (!$obj->AddAppointment($name, $email, $phone,$doctor)) {
            echo 'nooo';
            die("Failed to add user: ");
        }
       
        // Redirect back to the users page
       header('Location:../../../../clinic/home.php');
        exit;
    }
    
elseif(isset($_GET['doctor'])){
    $obj2 = new doctor();
        $name = $_GET['fullname'];
        $age = $_GET['age'];
        $department = $_GET['department'];
        $img=$_GET['img'];
        $title=$_GET['title'];
        $sub_title=$_GET['sub_title'];
    
        // Validate the input
        if (empty($name) || empty($age) || empty($department)||empty($img)||empty($title)||empty($sub_title)) {
            die("Please fill in all fields");
        }
           $reaul=$obj2->AddDoctor($name, $age, $department,$img,$title,$sub_title);
           echo $reaul;
        // Call the AddUsser method and pass the input
        if (!$reaul) {
           
            die("Failed to add user: ");
        }
       
        // Redirect back to the users page
         header('Location: ../doctors/allDoctors.php');
        exit;
    }
 