
<?php  require_once "inc/header.php ";?>
<?php  require_once "inc/nav.php ";?>
<?php require_once "cor/Db.php";?>
<?php require_once "cor/function.php";?>
<?php require_once "config.php";?>

<?php 

$nor = new Db();


if (isset($_GET['department'])){
    $id=$_GET['department'];
    $sql="SELECT * FROM `doctors`
    WHERE department='$id'";
}else{
    $sql= "SELECT * FROM `doctors`";
}
$result3 = mysqli_query($nor->connection(), $sql);




?>

    <div class="page-wrapper">
 
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= url('index.php?page=home')?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>
            <div class="doctors-grid">
            <?Php     
                while($row3=mysqli_fetch_assoc($result3)):  
                ?>
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?= url("public/doctors/".$row3['image']); ?>" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?= $row3['title']; ?>  </h4>
                        <h6 class="card-title fw-bold text-center"><?= $row3['Name']; ?></h6>
                        <?php $id=$row3['Id'];?>
                        <a href="<?php echo url("index.php?page=single-doctor&id=".$id);?>" class="btn btn-outline-primary card-button" >  <?= $row3['sub_title']; ?></a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php
            $start=0;
                    $page=3;
                    $record= mysqli_query($nor->connection(), "SELECT * FROM  `doctors` LIMIT 10 ");
                    $num_rows=mysqli_num_rows($record);
                        $pages= ceil($num_rows/$page);
                        if(isset($_GET['page-nr'])){
                        $pagess=$_GET['page-nr'] -1 ;
                        $start= $pagess * $page;
                        }
                        $select=mysqli_query($nor->connection(),"SELECT * FROM  `doctors` LIMIT $start,$pages");
                        $i=0;
                        foreach($select as $row3){
                            $i++;
                        }
                        ?>
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
    <?php  require_once "inc/footer.php";?>