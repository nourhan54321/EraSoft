
<?php require_once('C:\xamppnew\htdocs\All\Admin\AdminLTE-3.1.0\build\config\conf.php');
 ?>
<?php 
$conn=mysqli_connect('localhost','root','','clinic');
$sql2="SELECT  count(*) as count from contact ";
$res3=mysqli_query($conn,$sql2);
 
?>
<div class="preloader flex-column justify-content-center align-items-center">
   <img src="<?php echo IMAGES;?>AdminLTELogo.png?>" alt="AdminLTELogo" height="60" width="60">
  </div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <?php while($row=mysqli_fetch_assoc($res3)):?>
        <a class="nav-link" href="<?php echo BASE_URL;?>pages/mailbox/mailbox.php?>">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?=$row['count']?></span>
        </a>
        
          <?php endwhile?>
           
      </li>
      <!-- Notifications Dropdown Menu -->
        
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo IMAGES;?>user2-160x160.jpg?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
       

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              
             
            </ul>
          </li>
           
            
                
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
                <a href="<?php echo BASE_URL; ?>pages/charts/chartjs.php?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
            </ul>
          </li>
          
                
           
           
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL;?>pages/mailbox/mailbox.php?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL;?>pages/users/adduser.php?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
              Doctors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL;?>pages/doctors/addDoctor.php?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctors</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo BASE_URL;?>pages/doctors/allDoctors.php?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Doctors</p>
                </a>
              </li> 
            </ul>
          </li>
           
              
           
           
               
            </ul>
          </li>
           
           
            
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>