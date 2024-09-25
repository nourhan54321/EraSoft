
<?php  require_once "inc/header.php ";?>
<?php  require_once "inc/nav.php ";?>
<?php require_once "cor/Db.php";?>
 
 



<?php  
$nor = new Db();
$result1 = mysqli_query($nor->connection(), $nor->fetchData('hed'));
$result2 = mysqli_query($nor->connection(), $nor->fetchData("majors"),$nor->getJoin());
$result3 = mysqli_query($nor->connection(), $nor->fetchData("doctors"),$nor->getJoin());
$result4 = mysqli_query($nor->connection(), $nor->fetchData('every'));
$result5 = mysqli_query($nor->connection(), $nor->fetchData('footertop'));


?>

    <div class="page-wrapper">

        <div class="container-fluid bg-blue text-white pt-3">
            <div class="container pb-5">
                <div class="row gap-2"> 
                       <?php 
            while($row=mysqli_fetch_assoc($result1)):
            ?>
                    <div class="col-sm order-sm-2">
                        <img src="<?= url( "public/haeder/".$row['image']);?>" class="img-fluid banner-img banner-img" alt="banner-image"
                            height="200">
                    </div>
                    <div class="col-sm order-sm-1">
                        <h1 class="h1"><?php echo $row['title'];  ?></h1>
                        <p><?php echo $row['description'];  ?> </p>
                    </div>
                </div>
                 
            </div>
           <?php endwhile; ?>
        </div>
        <div class="container">
        

            <h2 class="h1 fw-bold text-center my-4">majors</h2>
        
            <div class="d-flex flex-wrap gap-4 justify-content-center"> 
            <?php 
            while($row2=mysqli_fetch_assoc($result2)):
            ?>
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?= url("public/majors/".$row2['image']); ?>" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"> <?= $row2['Name'];  ?></h4>
                        <?php $id=$row2['id'];?>
                        <a href="<?= url("index.php?page=doctor&department=". $row2['id']); ?>" class="btn btn-outline-primary card-button"><?= $row2['sup_title'];  ?></a>
                    </div>
                  
                </div>
                  <?php endwhile; ?>
            </div>  
          
            <h2 class="h1 fw-bold text-center my-4">doctors</h2>
            <section class="splide home__slider__doctors mb-5">
           
                <div class="splide__track  ">
                    <ul class="splide__list">  
                    <?php $i=0; ?>
                <?Php     
                while($row3=mysqli_fetch_assoc($result3)):  
                ?>
                        <li class="splide__slide <?php if($i == 0) echo"active"; $i++; ?>">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="<?= url("public/doctors/".$row3['image']); ?>" class="card-img-top rounded-circle card-image-circle"
                                    alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center"> <?= $row3['Name'];  ?> </h4>
                                    <h6 class="card-title fw-bold text-center"><?= $row3['title'];  ?></h6>
                                    <?php $id=$row3['Id'];?>
                                    <a href="<?= url("index.php?page=single-doctor&id=" . $id); ?>" class="btn btn-outline-primary card-button">ticket Now
                </a>
                                </div>
                            </div>
                        </li>
                        
                           <?php endwhile; ?>
                    </ul>  
                 
                </div>
              
    
            </section>
        </div>
        <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
        <?php  while($row4=mysqli_fetch_assoc($result4)):?>
            <div class="info">
          
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                        alt="" width="50" height="50">
                    <h4 class="title m-0">
                    <?= $row4['title'];  ?>
                    </h4>
                    <p class="content"> <?= $row4['description'];  ?>  </p>
                </div>
              
            </div>
             <?php  endwhile; ?>
            <?php while($row5=mysqli_fetch_assoc($result5)):?>
            <div class="bottom--left bottom--content bg-blue text-white">
                <h4 class="title"><?= $row5['title'];  ?>   </h4>
                <p> <?= $row5['desccription'];  ?>  </p>
                <div class="app-group">
                    <div class="app"> 
                        <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                            alt="">Google Play</div>
                    <div class="app"><img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                            alt="">App Store</div>
                </div>
            </div>
            <div class="bottom--right bg-blue text-white">
                <img src="<?= url("public/haeder/".$row5['image']);?>" class="img-fluid banner-img">
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php  require_once "inc/footer.php ";?>

