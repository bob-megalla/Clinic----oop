<?php
if (!empty($_SESSION['user_id'])): ?>
    <?php require_once('inc/header.php') ?>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <?php require_once('inc/navbar.php') ?>
            <?php require_once('inc/sidebar.php') ?>



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
                                    <li class="breadcrumb-item active">All Doctors</li>
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
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Doctor Name</th>
                                                    <th>Major</th>
                                                    <th>Image</th>
                                                    <th>
                                                        <a href="<?= "?admin=add-post" ?>" title="Add A New Post"
                                                            class="btn btn-block btn-outline-success">Add</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($allDoctors as $doctor): ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td>DR. <?= $doctor['name_doctor'] ?></td>
                                                        <td> <?php $name_major = Major::getRow("major",$doctor['major_id']) ?>
                                                            
                                                        <?=  $name_major["name_major"]?>
                                                            <!-- <div class="col-3">
                                                                <img src="assets/img/majors/<?= $doctor['img_major'] ?>"
                                                                    class="card-img-top rounded-circle card-image-circle"
                                                                    width="50" height="50" alt="major">
                                                            </div> -->
                                                        </td>
                                                        <td>
                                                            <div class="col-3">
                                                                <img src="assets/img/doctors/<?= $doctor['img_doctor'] ?>"
                                                                    class="card-img-top rounded-circle card-image-circle"
                                                                    width="50" height="50" alt="major">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="?admin=edit-doctor&id=<?= $doctor['id'] ?>"
                                                                title="Edit This doctor"
                                                                class="btn btn-block btn-outline-info">Edit</a>
                                                            <a href="?admin=DeleteDoctor&id=<?= $doctor['id'] ?>"
                                                                title="Delete This doctor"
                                                                class="btn btn-block btn-outline-danger">Delete</a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
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

            <?php require_once('inc/footer.php') ?>

        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>