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

                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h2 mr-4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <?php $this->load->view("_partials/breadcrumb.php") ?>

                    <!-- Content Row -->

                    <div class="card mb-3">
                        <div class="card-header">
                            <a class="btn btn-light" href="<?= base_url("admin/DataPeserta/daftarpeserta") ?>"><i
                                    class="fas fa-plus"></i> Add New Data Prakerin</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">NIS / NIM</th>
                                            <th style="text-align:center">Nama Peserta</th>
                                            <th style="text-align:center">Kelas</th>
                                            <th style="text-align:center">Jurusan</th>
                                            <th style="text-align:center">Jenis Kelamin</th>
                                            <th style="text-align:center">No. HP Peserta</th>
                                            <th style="text-align:center">Nama Orang Tua</th>
                                            <th style="text-align:center">No. HP Orang Tua</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data_peserta as $dtpeserta) : ?>
                                        <tr>
                                            <td width="25" style="text-align:center">
                                                <?php echo $i ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->nis_nim ?>
                                            </td>
                                            <td>
                                                <?php echo $dtpeserta->nama_peserta ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->kelas ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->nama_jurusan ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->jenis_kelamin ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->hp_peserta ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->ayah ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $dtpeserta->no_hp_orang_tua ?>
                                            </td>
                                            <td style="text-align:center">
                                                <a href="<?= base_url('admin/DataPeserta/editdatapeserta/' . $dtpeserta->id_peserta) ?>"
                                                    class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?= base_url('admin/DataPeserta/hapusdatapeserta/' . $dtpeserta->id_peserta) ?>')"
                                                    href="#!" class="btn btn-small text-danger"><i
                                                        class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            <?php $i++ ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

    <!-- Footer -->
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- End of Footer -->

    </div>

    <!-- Scroll to Top Button-->
    <?php $this->load->view("_partials/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("_partials/modal.php") ?>

    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view("_partials/js.php") ?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    </script>

    <script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>

</body>

</html>
