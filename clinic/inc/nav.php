
<?php require_once "cor/function.php";?>
<?php require_once "config.php";

session_start();
 
?>

<nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="login.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="<?= url('index.php?page=home')?>">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="<?= url('index.php?page=majors')?>"> majors </a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="<?= url('index.php?page=contact')?>">contact</a>
                            <?php if(!isset($_SESSION['auth'])): ?>
                        <a type="button" class="btn btn-outline-light navigation--button"
                           href="<?= url('index.php?page=login')?>">login</a>
                           <?php else: ?>
                            <a type="button" class="btn btn-outline-light navigation--button"
                            href="<?= url('index.php?page=logout')?>">LOGOUT</a>
                            <?php endif; ?>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="<?= url('index.php?page=doctor')?>">Doctors</a>
                         
                    </div>
                </div>
            </div>
        </nav>