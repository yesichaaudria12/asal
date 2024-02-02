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
                    <?php $this->load->view("_partials/breadcrumb.php") ?>

                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h2 mr-4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?= base_url('admin/DataProfil/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="<?= base_url('admin/DataProfil/daftarprofil') ?>" method="post">

                                <div class="form-group">
                                    <label for="username">Nama Admin *</label>
                                    <input
                                        class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>"
                                        type="text" name="username" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('username') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Foto Profil Baru *</label>
                                    <input type="file" name="gambar" accept="image/*">
                                <div class="invalid-feedback">
                                    <?php echo form_error('gambar') ?>
                                    </div>
                                </div>

                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </form>

                            <!-- Formulir untuk mengganti password -->
<form action="<?= base_url('admin/DataProfil/updatePassword') ?>" method="post">
    <div class="form-group">
        <label for="new_password">Password Baru *</label>
        <input type="password" name="new_password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Konfirmasi Password Baru *</label>
        <input type="password" name="confirm_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success" name="change_password">Ubah Password</button>
</form>

                        </div>

                        <div class="card-footer small text-muted">
                            * Wajib diisi
                        </div>

                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Page Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
