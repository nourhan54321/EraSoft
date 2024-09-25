 

// Check if the DB object is valid
 
 

<?php
session_start();
require_once('C:\xamppnew\htdocs\All\Admin\AdminLTE-3.1.0\pages\db\connection.php');

$obj = new Users();
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
$_SESSION['pagination_data']['result'] = mysqli_query($conn, "SELECT * FROM users");
$_SESSION['pagination_data']['total_pages'] = ceil(mysqli_num_rows($_SESSION['pagination_data']['result']) / 10); // adjust the limit as needed
$_SESSION['pagination_data']['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

// Limit the result set for the current page
$limit = 3; // adjust the limit as needed
$offset = ($_SESSION['pagination_data']['page'] - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM users LIMIT $offset, $limit");
?>
 

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Users</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php require_once('./pages/nav.php');?>
  <!-- Sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
           
            
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                  </tr>
                </thead>
  
                <?php while($row=mysqli_fetch_assoc($result)):?>
                <tbody>
                   
                  <tr>
                    <td><?=$row['Id']?></td>
                    <td><?=$row['Name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['phone']?></td>
                    <td><button><a href='#'>Delete</a></button></td>
                  </tr>
                  <!-- Add more table rows here -->
                </tbody>
                
                <?php endwhile?>
              </table>
              <div class="pagination">
  <!-- Previous page link -->
         <a href="users.php?page=<?php echo $_SESSION['pagination_data']['page'] - 1; ?>" class="prev <?php if ($_SESSION['pagination_data']['page'] == 1) echo 'disabled'; ?>">Previous</a>
  
  <!-- Page numbers -->
         <?php for ($i = 1; $i <= $_SESSION['pagination_data']['total_pages']; $i++) { ?>
         <a href="users.php?page=<?php echo $i; ?>" class="<?php if ($i == $_SESSION['pagination_data']['page']) echo 'active'; ?>"><?php echo $i; ?></a>
          <?php } ?>
  
  <!-- Next page link -->
         <a href="users.php?page=<?php echo $_SESSION['pagination_data']['page'] + 1; ?>" class="next <?php if ($_SESSION['pagination_data']['page'] == $_SESSION['pagination_data']['total_pages']) echo 'disabled'; ?>">Next</a>
          </div>

         </div>
         
         
         <!-- /.card-body -->
</div>
            </div>
            
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
     
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>