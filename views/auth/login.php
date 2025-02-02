<?php
require_once BASE_PATH . "../views/frontend/inc/header.php";
require_once BASE_PATH . "../views/frontend/inc/navbar.php";
require_once BASE_PATH . "Session.php";

?>
<?php if(!isset($_SESSION['user_id'])):?>
<body>
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="POST" action="?page=checkUser">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="?page=register">create account</a>
                </div>
                <?php if(Session::getSession("errors")) :?>
                    <?php require_once BASE_PATH . "../views/errors/error.php"?>
                <?php endif;?>
            </div>

        </div>
    </div>
    <?php Session::removeSession("errors")?>

    <?php
    require_once BASE_PATH . "../views/frontend/inc/footer.php";

    ?>
    <?php else:
  header("Location: ?admin=dashboard" );
  ?>
  
<?php endif; ?>