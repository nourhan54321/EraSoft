<?php require_once "../clinic/inc/header.php" ?>
<?php require_once "../clinic/inc/nav.php";
// require_once "../clinic/inc/search.php" 
 
?>
 
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="http://localhost/All/clinic/index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
            <form class="form" action="http://localhost/All/clinic/index.php?page=user-login" method="POST">
              <?php if(isset($_SESSION['errors']['login'])): ?>
                    <h3 class="text-danger"><?= $_SESSION['errors']['login'] ?></h3>
                         <?php endif; ?>
                    <div class="mb-3">
                        <label  for="email">Email</label>
                        <input class="form-control" id="email" name = "email" >
                        <?php if(isset($_SESSION['errors']['email'])): ?>
                        <span class="text-danger"><?= $_SESSION['errors']['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label  for="password">password</label>
                        <input type="password" class="form-control" id="password" name =  "password">
                        <?php if(isset($_SESSION['errors']['password'])): ?>
                        <span class="text-danger"><?= $_SESSION['errors']['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
               
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="http://localhost/All/clinic/index.php?page=register">create account</a>
                </div>
            </div>

        </div>
    </div>
    <?php require_once "../clinic/inc/footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>