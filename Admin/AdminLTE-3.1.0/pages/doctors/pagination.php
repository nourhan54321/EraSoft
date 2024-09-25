
<?php
// pagination.php

// Assume you have a working database connection
$conn = mysqli_connect('localhost','root','', 'clinic');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the current page number from the URL parameter
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set the limit for the number of records per page
$limit = 3; // adjust the limit as needed

// Calculate the offset for the current page
$offset = ($page - 1) * $limit;

// Query the database to retrieve the records for the current page
$result = mysqli_query($conn, "SELECT * FROM doctors where id>$offset LIMIT $limit");

// Get the total number of records in the database
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT count(*) FROM doctors"));

// Calculate the total number of pages
$total_pages = ceil($total_records / $limit);

// Set the pagination data in the session
$_SESSION['pagination_data'] = array(
    'result' => $result,
    'total_pages' => $total_pages,
    'page' => $page
);

// Redirect back to the original page
header('Location:../db/edit.php'); // adjust the redirect URL as needed
exit;