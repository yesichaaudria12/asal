<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view("_partials/head.php"); ?>
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

                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h1 class="h2 mr-4 mb-0 text-black-800"><?= $title; ?></h1>
                </div>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>


                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <!-- Profile Card -->
                            <div class="col-lg-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="align-items-center text-center">
                                            <img src="<?= base_url('assets/img/profile.jpg'); ?>" alt=""
                                                class="rounded-circle p-1 bg-primary" width="110">
                                            <h4 class="card-title"><?= $user_profile->username; ?></h4>
                                            <h6 class="card-title"><?= $user_profile->role; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Profile Form -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $this->session->flashdata('message'); ?>
                                        <?= form_open('profile/MyProfile/update_profile'); ?>
                                        <?= form_hidden('user_id', $user_profile->user_id ?? ''); ?>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <?= form_input('name', $user_profile->name ?? '', 'class="form-control"'); ?>
                                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <?= form_input('username', $user_profile->username ?? '', 'class="form-control"'); ?>
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <?= form_input('email', $user_profile->email ?? '', 'class="form-control"'); ?>
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <?= form_submit('btn_save', 'Update', 'class="btn btn-success"'); ?>
                                            </div>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer, Scroll to Top Button, Logout Modal, Bootstrap core JavaScript, and TinyMCE Script -->
    <?php
    $this->load->view("_partials/footer.php");
    $this->load->view("_partials/scrolltop.php");
    $this->load->view("_partials/modal.php");
    $this->load->view("_partials/js.php");
    ?>
    <script src="<?= base_url('assets'); ?>/vendor/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea',
        menubar: 'custom',
    });
    </script>

</body>

</html>