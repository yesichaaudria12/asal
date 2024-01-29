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
                            <a href="<?= base_url('admin/DataSiswa/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">

                            <form action="<?= base_url('admin/DataSiswa/daftarsiswa') ?>" method="post">
                                <div class="form-group">
                                    <label for="nis_nim">NIS / NIM *</label>
                                    <input class="form-control <?php echo form_error('nis_nim') ? 'is-invalid' : '' ?>"
                                        type="number" name="nis_nim" placeholder=""></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nis_nim') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa *</label>
                                    <input
                                        class="form-control <?php echo form_error('nama_siswa') ? 'is-invalid' : '' ?>"
                                        type="text" name="nama_siswa" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_siswa') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kelas">Kelas *</label>
                                    <input class="form-control <?php echo form_error('kelas') ? 'is-invalid' : '' ?>"
                                        type="number" name="kelas" placeholder=""></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kelas') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan *</label>
                                    <select
                                        class="form-control <?php echo form_error('id_jurusan') ? 'is-invalid' : '' ?>"
                                        name="id_jurusan">
                                        <option disabled selected value="">---Pilih Jurusan--</option>
                                        <option value="1">Teknik Komputer dan Jaringan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_jurusan') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin *</label>
                                    <select
                                        class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>"
                                        name="jenis_kelamin">
                                        <option disabled selected value="">---Pilih Jenis Kelamin--</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jenis_kelamin') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="hp_siswa">No. HP Siswa *</label>
                                    <input class="form-control <?php echo form_error('hp_siswa') ? 'is-invalid' : '' ?>"
                                        type="number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" name="hp_siswa"
                                        placeholder=""></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('hp_siswa') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ayah">Nama Orang Tua *</label>
                                    <input class="form-control <?php echo form_error('ayah') ? 'is-invalid' : '' ?>"
                                        type="text" name="ayah" placeholder=""></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('ayah') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_orang_tua">No. HP Orang Tua</label>
                                    <input
                                        class="form-control <?php echo form_error('no_hp_orang_tua') ? 'is-invalid' : '' ?>"
                                        type="number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" name="no_hp_orang_tua"
                                        placeholder=""></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_hp_orang_tua') ?>
                                    </div>
                                </div>

                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
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