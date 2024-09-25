<?php  require_once "inc/header.php ";?>
<?php  require_once "inc/nav.php ";?>
<?php require_once "cor/Db.php";?>
<?php require_once "cor/function.php";?>
<?php require_once "config.php";?>
<?php 
$nor = new Db();

$result2 = mysqli_query($nor->connection(), $nor->fetchData("majors"));

?> 
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= url('index.php?page=home')?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">majors</li>
                </ol>
            </nav>  
            <div class="majors-grid">
                <?php while($row3=mysqli_fetch_assoc($result2)):  ?>
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?= url("public/majors/".$row3['image']);?>" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"> <?= $row3['Name'];  ?></h4>
                        <a href="<?= url("index.php?page=doctor&department=". $row3['id']); ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
             <?php endwhile; ?>
            </div>
            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link page-next" href="#" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <?php  require_once "inc/footer.php ";?>
