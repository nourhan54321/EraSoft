<?php  require_once "inc/header.php ";?>
<?php  require_once "inc/nav.php ";?>
<?php require_once "cor/function.php";?>
<?php require_once "config.php";?>


    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= url('index.php?page=home')?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                </ol>
            </nav>   
                <?php if(isset($_SESSION['success'])): ?> 
                <div class="alert alert-success text-center"><?= $_SESSION['success'] ;?></div>  
                <?php unset($_SESSION['success']) ;?> 
                <?php endif; ?>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form col-11" novalidate  action="<?= url("controllers/user-contact.php"); ?>" method="POST" >
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <span class="text-danger text-left"><?= $_SESSION['errors']['name'] ?? '';?></span>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" required>
                        </div>
                        <span class="text-danger"><?= $_SESSION['errors']['phone'] ?? '';?></span>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <span class="text-danger"><?= $_SESSION['errors']['email'] ?? '';?></span>
                        <div class="mb-3">
                            <label class="form-label required-label" for="subject">subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" required>
                        </div>
                        <span class="text-danger"><?= $_SESSION['errors']['subject'] ?? '';?></span>
                        <div class="mb-3">
                            <label class="form-label required-label" for="message">message</label>
                            <textarea class="form-control" name="message" id="message" required></textarea>
                            <span class="text-danger"><?= $_SESSION['errors']['message'] ?? '';?></span>
                        </div>
                     
                    </div>   
                    <button type="submit" class="btn btn-primary" name='contact'>Send Message</button>
                </form>
            </div>

        </div>
    </div>
    <?php unset($_SESSION['errors']) ;?> 
    <?php  require_once "inc/footer.php ";?>