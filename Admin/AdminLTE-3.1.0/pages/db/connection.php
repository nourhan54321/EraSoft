<?php

class Users
{
    public function AddUser($name, $email, $password,$phone)
    {
        // Establish a database connection
        $conn = mysqli_connect('localhost', 'root', '', 'clinic');
    
        // Check if the connection was successful
        if (!$conn) {
            return "Connection failed: " . mysqli_connect_error();
        }
    
        // Prepare the SQL query with parameterized values
        $sql = "INSERT INTO users (name, email, password,phone) VALUES (?, ?, ?, ?)";
    
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
    
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password,$phone);
    
        // Execute the statement
        if (!mysqli_stmt_execute($stmt)) {
            $error = "SQL query failed: " . mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            return $error;
        }
    
        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
        // Return success message
        return "User added successfully";
    }

    public function allUsers(){
        $conn=mysqli_connect('localhost','root','','clinic');
         $sql="SELECT * from users";
         $res=mysqli_query($conn,$sql);
        return $res;
        }
          
}


 class Appointment{

function deleteAppoint($id){
 $conn=mysqli_connect('localhost','root','','clinic');
 $sql="DELETE  from appoint where id=$id";
 $res=mysqli_query($conn,$sql);
 return $res;
}
 
public function allAppointment(){
    $conn=mysqli_connect('localhost','root','','clinic');
    $sql="SELECT *,(select Name from doctors where Id=appoint.doctor_id)as Name from appoint ";
    $res=mysqli_query($conn,$sql);
    return $res;
    }

    public function AddAppointment($name, $email, $phone,$doctor)
    {
        // Establish a database connection
        $conn = mysqli_connect('localhost', 'root', '', 'clinic');
    
        // Check if the connection was successful
        if (!$conn) {
            return "Connection failed: " . mysqli_connect_error();
        }
    
        // Prepare the SQL query with parameterized values
        $sql = "INSERT INTO appoint (name, email, phone,doctor_id) VALUES (?, ?, ? ,?)";
    
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
    
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $phone,$doctor);
    
        // Execute the statement
        if (!mysqli_stmt_execute($stmt)) {
            $error = "SQL query failed: " . mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            return $error;
        }
    
        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
        // Return success message
        return "User added successfully";
    }


}


class doctor{
     function allDoctors(){
        $conn=mysqli_connect('localhost','root','','clinic');
         $sql="SELECT * from doctors";
         $res=mysqli_query($conn,$sql);
        return $res;

     }
     function doctorDepart(){
        $conn=mysqli_connect('localhost','root','','clinic');
         $sql="SELECT  distinct majors.Name as 'name' from majors ";
         $res=mysqli_query($conn,$sql);
        return $res;

     }
     public function AddDoctor($name, $age, $department,$img,$title,$sub_title)
{
    // Establish a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'clinic');

    // Check if the connection was successful
    if (!$conn) {
        return "Connection failed: " . mysqli_connect_error();
    }

    // Prepare the SQL query with parameterized values
    $sql = "INSERT INTO doctors (name, age, department, image, title, sub_title) VALUES (?, ?, ?, ?, ?, ?)";
    $sql2 = "SELECT id from majors where Name=?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    $stmt2 = mysqli_prepare($conn, $sql2);

    // Check if the statement preparation was successful
    if (!$stmt) {
        $error = "Statement preparation failed: " . mysqli_error($conn);
        mysqli_close($conn);
        return $error;
    }

    if (!$stmt2) {
        $error = "Statement preparation failed: " . mysqli_error($conn);
        mysqli_close($conn);
        return $error;
    }

    // Bind the parameters
    if (!mysqli_stmt_bind_param($stmt2, "s", $department)) {
        $error = "Parameter binding failed: " . mysqli_stmt_error($stmt2);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $error;
    }

    // Execute the statement
    if (!mysqli_stmt_execute($stmt2)) {
        $error = "SQL query failed: " . mysqli_stmt_error($stmt2);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $error;
    }

    // Store the result of the second query
    mysqli_stmt_store_result($stmt2);

    // Get the result of the second query
    mysqli_stmt_bind_result($stmt2, $majorId);
    mysqli_stmt_fetch($stmt2);

    // Free the result set
    mysqli_stmt_free_result($stmt2);

    // Bind the parameters for the first statement
    if (!mysqli_stmt_bind_param($stmt, "sissss", $name, $age, $majorId,$img,$title,$sub_title)) {
        $error = "Parameter binding failed: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $error;
    }

    // Execute the first statement
    if (!mysqli_stmt_execute($stmt)) {
        $error = "SQL query failed: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $error;
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return success message
    return "Doctor added successfully";
}
function deleteDoctor($id){
    $conn=mysqli_connect('localhost','root','','clinic');
    $sql="DELETE  from doctors where id=$id";
    $res=mysqli_query($conn,$sql);
    return $res;
   }
function countDoctor(){
    $conn=mysqli_connect('localhost','root','','clinic');
    $sql="SELECT count(*)  as total from doctors";
    $res=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    return $row['total'];
    
}
function Limitdoctor($start,$limit){
    $conn=mysqli_connect('localhost','root','','clinic');
    $sql="SELECT * FROM doctors LIMIT $start, $limit";
    $res=mysqli_query($conn,$sql);
    return $res;
}

}
 

class Contact{
    public function AddContact($name, $email, $phone, $subject, $message)
    {
        // Establish a database connection
        $conn = mysqli_connect('localhost', 'root', '', 'clinic');
    
        // Check if the connection was successful
        if (!$conn) {
            return "Connection failed: " . mysqli_connect_error();
        }
    
        // Prepare the SQL query with parameterized values
        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
    
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $subject, $message);
        
        // Execute the statement
        if (!mysqli_stmt_execute($stmt)) {
            $error = "SQL query failed: " . mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            return $error;
        }
    
        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
        // Return success message
        return "contact added successfully";
    }

}




class img{
    function returnImg($name){
        $conn=mysqli_connect('localhost','root','','clinic');
        $sql="SELECT  image from img where name=$name";
        $res=mysqli_cquery($conn,$sql);
        return $res;
    }
}