<?php
if (!empty($_SESSION['user_id'])): ?>
    <?php require_once(BASE_PATH . '../views/backend/inc/header.php') ?>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <?php require_once(BASE_PATH . '../views/backend/inc/navbar.php') ?>
            <?php require_once(BASE_PATH . '../views/backend/inc/sidebar.php') ?>



            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"><?= strtoupper($page_name) ?></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?= '?admin=dashboard' ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?= '?admin=allBooked' ?>">All Booked</a></li>
                                    <ages class="breadcrumb-item active">Booked</ages>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if (isset($_SESSION['success'])) {
                                    require_once('views/errors/success.php');
                                }
                                unset($_SESSION['success'])
                                    ?>
                                <?php
                                if (isset($_SESSION['errors'])) {
                                    require_once('views/errors/error.php');
                                }
                                unset($_SESSION['errors'])
                                    ?>
                                <!-- START -->
                                <div class="card card-widget">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <span class="username"><a href="#"><?= strtoupper($selectedBooked[0]['name'])?></a></span>
                                            <span class="description">Time : <i class="far fa-clock mr-1"></i>
                                                                <?= date('d F Y', strtotime($selectedBooked[0]['created_at'])) ?>
                                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool <?php if($selectedBooked[0]["is_compeleted"]== "yes") echo "text-danger" ?? "" ?>" data-toggle="tooltip" title="IF READ IT MEANS ALREADY READ">
                                                <i class="far fa-circle"></i></button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- post text -->
                                        <p>Patient Name : <?= strtoupper($selectedBooked[0]['name'])?></p>
                                        <p>Patient Phone : <?= $selectedBooked[0]['phone']?></p>
                                        <p>Patient Email : <?= $selectedBooked[0]['email']?></p>
                                        <p>Doctor Name: <?= $selectedBooked[0]['name_doctor']?></p>
                       
                                    </div>
                                 
                                </div>


                                <!-- END -->
                            </div>
                            <!-- /.col-md-6 -->

                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php require_once(BASE_PATH . '../views/backend/inc/footer.php') ?>

        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>