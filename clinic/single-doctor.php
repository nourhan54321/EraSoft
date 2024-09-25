<?php  require_once "inc/header.php ";?>
<?php  require_once "inc/nav.php ";?>
<?php  require_once "cor/Db.php ";?>
<?php  require_once "cor/function.php";?>

<?php 
$nor=new Db();
$nor->getDetails('doctors',$_GET['id']);

?>
    <div class="page-wrapper">
      <div class="container">
        <nav
          style="--bs-breadcrumb-divider: '>'"
          aria-label="breadcrumb"
          class="fw-bold my-4 h4"
        >
          <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item">
              <a class="text-decoration-none" href="<?= url('index.php?page=home')?>">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="text-decoration-none" href="<?= url('index.php?page=doctor')?>">doctors</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              doctor name
            </li>
          </ol>
        </nav>
        <div class="d-flex flex-column gap-3 details-card doctor-details">
          <div class="details d-flex gap-2 align-items-center">
            <img
              src="<?= "public/majors/".$row3['image'];?>"
              alt="doctor"
              class="img-fluid rounded-circle"
              height="150"
              width="150"/>
            <div class="details-info d-flex flex-column gap-3">
              <h4 class="card-title fw-bold"> </h4>
              <h6 class="card-title fw-bold">
                doctor major and more info about the doctor in summary
              </h6>
            </div>
          </div>
          <hr />
          <?php $doctor = $_GET['id']; ?>
          <form class="form" action="../Admin/AdminLTE-3.1.0/pages/db/insert.php" method="GET">
          <input type="hidden" name="doctor" value="<?php echo $doctor; ?>">
            <div class="form-items">
              <div class="mb-3">
                <label class="form-label required-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name='fullname' required />
              </div>
              <div class="mb-3">
                <label class="form-label required-label" for="phone"
                  >Phone</label
                >
                <input type="tel" class="form-control" id="phone" name='phone' required />
              </div>
              <div class="mb-3">
                <label class="form-label required-label" for="email" 
                  >Email</label
                >
                <input type="email" class="form-control" id="email" name='email' required />
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name='Time'>
              Confirm Booking
            </button>
          </form>
        </div>
      </div>
    </div>
    <?php  require_once "./inc/footer.php";?>
  
