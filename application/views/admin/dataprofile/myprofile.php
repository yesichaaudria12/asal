<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-2">
                        <h1 class="h2 mr-4 mb-0" style="color: black; "><?php echo $title ?></h1>
                    </div>

                    <!-- My Profile Content -->
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="align-items-center text-center">
                                                <img src="<?php echo base_url('assets/img/profile.jpg'); ?>" alt=""
                                                    class="rounded-circle p-1 bg-primary" width="110">
                                                <h4 class="card-title"><?php echo $user_profile->username; ?></h4>
                                                <h6 class="card-title"><?php echo $user_profile->role; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="<?= current_url(); ?>" method="POST" enctype="multipart/form-data">
                                            
                                            <!-- ubah profile -->
                                            <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="name"
                                                            value="<?= $user_profile->name; ?>" />
                                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Username</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="username"
                                                            value="<?= $user_profile->username; ?>" />
                                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="email"
                                                            value="<?= $user_profile->email; ?>" />
                                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                             <!-- ubah password -->
                             <h4 style="margin-left: 15px;">Change Password</h4>
                             <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="<?= current_url(); ?>" method="POST">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">New Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="password" class="form-control" name="password"
                                                            value="" />
                                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Confirm New Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="password" class="form-control" name="confirmpassword"
                                                            value="" />
                                                        <?= form_error('confirmpassword', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                                    </div>
                                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

        </div>
        <!-- Footer -->
        <?php $this->load->view("_partials/footer.php") ?>
        <!-- End of Footer -->

        <!-- Scroll to Top Button-->
        <?php $this->load->view("_partials/scrolltop.php") ?>

        <!-- Logout Modal-->
        <?php $this->load->view("_partials/modal.php") ?>

        <!-- Bootstrap core JavaScript-->
        <?php $this->load->view("_partials/js.php") ?>

</body>



</html>
