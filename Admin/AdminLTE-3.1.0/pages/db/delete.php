<?php
require_once('connection.php');

// Get the ID from the URL
if(isset($_POST['appoint'])){
$id = $_GET['id'];

// Validate the ID
if (empty($id) || !is_numeric($id)) {
    die("Invalid ID");
}

$obj = new Appointment();

// Call the deleteAppoint method and pass the ID
if (!$obj->deleteAppoint($id)) {
    die("Failed to delete appointment: " );
}

// Redirect back to the appointment list page
header('Location:../../Appointment.php');
exit;
}

// Get the ID from the URL
elseif(isset($_POST['doctor'])){
    $id = $_GET['id'];
    
    // Validate the ID
    if (empty($id) || !is_numeric($id)) {
        die("Invalid ID");
    }
    
    $obj = new doctor();
    
    // Call the deleteAppoint method and pass the ID
    if (!$obj->deleteDoctor($id)) {
        die("Failed to delete appointment: " );
    }
    
    // Redirect back to the appointment list page
    header('Location:../doctors/allDoctors.php');
    exit;
    }