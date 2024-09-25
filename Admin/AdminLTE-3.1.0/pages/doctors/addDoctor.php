<?php
    require_once('C:\xamppnew\htdocs\All\Admin\AdminLTE-3.1.0\pages\db\connection.php');
    $obj=new doctor();
    $result=$obj->doctorDepart();
                                         ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Doctors</title>

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
            <h1>Add Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="x_content">
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='../db/insert.php' method='GET'>

 

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="fullname" required="required" class="form-control ">
											</div>
										</div>
										 
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Age <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="age" class="form-control" type="text" name="age" required="required">
											</div>
										</div>
										 	 
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Image <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="img" class="form-control" type="text" name="img" required="required">
											</div>
										</div>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="title" required="required" class="form-control ">
											</div>
										</div>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Sub title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="sub_title" required="required" class="form-control ">
											</div>
										</div>      
										<div class="item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3 label-align" >Department <span class="required">*</span>
                                             </label>
                                           <div class="col-md-6 col-sm-6 ">
                                            <select name="department">
                                                <?php while($row = mysqli_fetch_assoc($result)):?>
                                                   <option name='department' value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                                 <?php endwhile;?>
                                              </select>
                                             </div>
                                        </div>
                                       
										<div class="ln_solid"></div>
                                                 <div class="item form-group">
                                                  <div class="col-md-6 col-sm-6 offset-md-3">
                                                     <button class="btn btn-primary" type="submit"  name='doctor' >Add</button>
                                                   </div>
                                                </div>
												 
										 

									</form>
      
      <!-- /.row -->
 </div>
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
