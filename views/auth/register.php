<?php
require_once BASE_PATH . "../views/frontend/inc/header.php";
require_once BASE_PATH . "../views/frontend/inc/navbar.php";
?>
<?php require_once BASE_PATH . 'Session.php' ?>

<body>
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" method="POST" action="?page=addNewUser">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                    <?php if (Session::getSession("errors")): ?>
                        <?php require_once BASE_PATH . "../views/errors/error.php" ?>
                    <?php endif; ?>
                    <?php if (Session::getSession("success")): ?>
                        <?php require_once BASE_PATH . "../views/errors/success.php" ?>
                    <?php endif; ?>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="?page=login"> login</a>
                </div>
            </div>

        </div>
    </div>



    <?php
    require_once BASE_PATH . "../views/frontend/inc/footer.php";

    ?>
    <?php Session::removeSession("errors") ?>
    <?php Session::removeSession("success") ?>