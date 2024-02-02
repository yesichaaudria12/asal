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
                        <?php if (!isset($pengajuanprakerin->status_validasi) || $pengajuanprakerin->status_validasi != "Diterima") { ?>
                            <div class="card-body">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading"><strong>Maaf, Anda tidak diizinkan mengakses menu ini!</strong></h4>
                                    <p>Karena pengajuan Prakerin Anda masih berstatus
                                        <?php if (empty($pengajuanprakerin->status_validasi)) { ?>
                                            <strong> Belum mengajukan. </strong>
                                        <?php } else { ?>
                                            <strong><?php echo $pengajuanprakerin->status_validasi ?></strong>.</p>
                                <?php } ?>
                                <hr>
                                <p class="mb-0">Jika terdapat pernyataan terkait Prakerin, silahkan hubungi Koordinator Prakerin, Bapak/Ibu Guru, atau Koordinator Jurusan di Program Studi Anda</p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card-header">
                                <a href="<?= base_url('peserta/JurnalPRAKERIN/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('peserta/JurnalPRAKERIN/tambahjurnalprakerin') ?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="id_peserta" value="<?php echo $this->session->userdata('id_peserta') ?>" />

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="tanggal">Tanggal</label>
                                            <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" id="datepicker" type="date" name="tanggal" placeholder="" value="<?php echo date('Y-m-d'); ?>"></input>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tanggal') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Mata Pelajaran</label>
                                        <select class="form-control <?php echo form_error('mapel') ? 'is-invalid' : '' ?>" name="mapel" id="mapel">
                                            <option disabled selected value="">Pilih Mata Pelajaran : </option>
                                            <?php foreach ($mapel as $row) { ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama_mapel; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_kompetensi_dasar">Kompetensi Dasar</label>
                                        <select class="id_kompetensi_dasar form-control <?php echo form_error('id_kompetensi_dasar') ? 'is-invalid' : '' ?>" name="id_kompetensi_dasar" id="id_kompetensi_dasar">
                                            <option value="">Pilih Kompetensi Dasar : </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('id_kompetensi_dasar') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="topik_pekerjaan">Topik Pekerjaan</label>
                                        <textarea class="form-control <?php echo form_error('topik_pekerjaan') ? 'is-invalid' : '' ?>" type="text" name="topik_pekerjaan" placeholder=""></textarea>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('topik_pekerjaan') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dokumentasi">Dokumentasi <strong>(Maks. ukuran file 1MB)</strong> </label>
                                        <input id="dokumentasi" class="form-control-file <?php echo form_error('dokumentasi') ? 'is-invalid' : '' ?>" type="file" name="dokumentasi" accept="image/*" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('dokumentasi') ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="status" value="Belum Tervalidasi" />

                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />

                                </form>

                            </div>

                            <div class="card-footer small text-muted">
                                * Wajib diisi
                            </div>

                        <?php } ?>

                    </div>
                    <!-- End of Content Row -->

                </div>
                <!-- End of Content Fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#mapel').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>peserta/JurnalPRAKERIN/getKompetensidasar",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id + '>' + data[i].kompetensi_dasar + '</option>';
                        }
                        $('.id_kompetensi_dasar').html(html);
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        var uploadField = document.getElementById("dokumentasi");
        uploadField.onchange = function() {
            if (this.files[0].size > 1048576) {
                alert("Foto terlalu besar");
                this.value = "";
            };
        };
    </script>

</body>

</html>