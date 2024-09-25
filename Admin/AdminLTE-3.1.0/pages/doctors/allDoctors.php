<?php
session_start();
require_once('C:\xamppnew\htdocs\All\Admin\AdminLTE-3.1.0\build\config\conf.php');
// Assume you have a working database connection
$conn = mysqli_connect('localhost','root','','clinic');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assume you have a pagination_data array set in your session
if (!isset($_SESSION['pagination_data'])) {
    $_SESSION['pagination_data'] = array();
}

// Set pagination data (e.g., from a database query)
$_SESSION['pagination_data']['result'] = mysqli_query($conn, "SELECT * FROM doctors");
$_SESSION['pagination_data']['total_pages'] = ceil(mysqli_num_rows($_SESSION['pagination_data']['result']) / 10); // adjust the limit as needed
$_SESSION['pagination_data']['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

// Limit the result set for the current page
$limit = 3; // adjust the limit as needed
$offset = ($_SESSION['pagination_data']['page'] - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM doctors LIMIT $offset, $limit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Mailbox</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php require_once('../nav.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Doctors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
   
     <div class="row">

     <div class="col-md-12">
       <div class="card">
         <div class="card-header">
           <h3 class="card-title">List of Users</h3>
         </div>
         <!-- /.card-header -->
         
         <div class="card-body">
        
         
         
<!-- Display the doctor list -->
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>age</th>
      <th>Department</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)):?>
    <tr>
      <td><?=$row['Id']?></td>
      <td><?=$row['Name']?></td>
      <td><?=$row['age']?></td>
      <td><?=$row['department']?></td>
     <td><form  action='../db/delete.php?id=<?=$row['Id']?>' method="post">
    <input type="submit" name="doctor" value="Delete">
     </form>
    </td>
    </tr>
    <?php endwhile?>
  </tbody>
</table>

<div class="pagination">
  <!-- Previous page link -->
         <a href="allDoctors.php?page=<?php echo $_SESSION['pagination_data']['page'] - 1; ?>" class="prev <?php if ($_SESSION['pagination_data']['page'] == 1) echo 'disabled'; ?>">Previous</a>
  
  <!-- Page numbers -->
         <?php for ($i = 1; $i <= $_SESSION['pagination_data']['total_pages']; $i++) { ?>
         <a href="allDoctors.php?page=<?php echo $i; ?>" class="<?php if ($i == $_SESSION['pagination_data']['page']) echo 'active'; ?>"><?php echo $i; ?></a>
          <?php } ?>
  
  <!-- Next page link -->
         <a href="allDoctors.php?page=<?php echo $_SESSION['pagination_data']['page'] + 1; ?>" class="next <?php if ($_SESSION['pagination_data']['page'] == $_SESSION['pagination_data']['total_pages']) echo 'disabled'; ?>">Next</a>
          </div>

         </div>
         
         
         <!-- /.card-body -->
</div>
       <!-- /.car
     </div>
      
  <!-- Previous page link -->
   
  
  <!-- Previous page link -->
 
 
   <!-- /.row -->
 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
   
 
</script>
</body>
</html>
