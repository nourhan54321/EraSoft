<?php require_once "../clinic/inc/header.php" ?>
<?php require_once "../clinic/inc/nav.php" ?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="http://localhost/All/clinic/index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" action="http://localhost/All/clinic/index.php?page=user-register" method="POST">
                    <div class="form-items">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <?php if(isset($_SESSION['errors']['name'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" >
                            <?php if(isset($_SESSION['errors']['phone'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['phone'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input  class="form-control" id="email" name="email" >
                            <?php if(isset($_SESSION['errors']['email'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['email'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            <?php if(isset($_SESSION['errors']['password'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['password'] ?></span>
                            <?php endif; ?>
                        </div>
                        <?php unset($_SESSION['errors']); ?>

                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="http://localhost/All/clinic/index.php?page=login"> login</a>
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