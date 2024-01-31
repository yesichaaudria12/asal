    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <?php if ($this->session->userdata("role") === "admin_prakerin") { ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/Dashboard/'); ?>">
                <div class="sidebar-brand-icon">
                    <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
                </div>
            </a>
            <p class="text-center text-white text-uppercase font-weight-bold">Halaman Admin</p>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?php echo $this->uri->segment(2) == 'Dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Dashboard/'); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: white;">
                Master Data
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataMentor' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataMENTOR/'); ?>">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Data Mentor</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataPeserta' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataPeserta/'); ?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Prakerin</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataGuru' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataGuru/'); ?>">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Data Guru</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: white;">
                Manage Account
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'Akun' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Akun/'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Account</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading" style="color: white;">
                Internship Data
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PengajuanPRAKERIN' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PengajuanPRAKERIN/'); ?>">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Pengajuan Prakerin</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PelaksanaanPRAKERIN' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PelaksanaanPRAKERIN/'); ?>">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Pelaksanaan Prakerin</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading" style="color: white;">
                Penilaian Prakerin
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PenilaianPRAKERIN' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PenilaianPRAKERIN/'); ?>">
                    <i class="fas fa-fw fa-pen-square"></i>
                    <span>Penilaian Prakerin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <hr class="sidebar-divider">

    </ul>

    <!-- End of Sidebar -->

    <?php  } ?>

    <?php if ($this->session->userdata("role") === "pembimbing_mentor") { ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pembimbingmentor/Dashboard/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman<br>Mentor</br></p>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Catatan Kegiatan Prakerin Peserta
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'ValidasiJurnalPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/ValidasiJurnalPRAKERIN'); ?>">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Validasi Logbook Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'AbsensiPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/AbsensiPRAKERIN'); ?>">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Absensi Peserta Prakarin</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Penilaian Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PenilaianPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/PenilaianPRAKERIN/'); ?>">
                <i class="fas fa-fw fa-pen-square"></i>
                <span>Penilaian Prakerin</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

    <?php } ?>

    <?php if ($this->session->userdata("role") === "peserta") { ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('peserta/Dashboard/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman Peserta</p>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Pengajuan Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'InfoMentor' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/InfoMENTOR'); ?>">
                <i class="fas fa-fw fa-info-circle"></i>
                <span>Info Mentor</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PermohonanPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/PermohonanPRAKERIN'); ?>">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Permohonan Prakerin</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Kegiatan Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'JurnalPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/JurnalPRAKERIN'); ?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Logbook Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'ProgramPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/ProgramPRAKERIN'); ?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Program Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PresensiPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/PresensiPRAKERIN'); ?>">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Presensi Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'CatatanKunjunganPRAKERIN' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('peserta/CatatanKunjunganPRAKERIN'); ?>">
                <i class="fas fa-fw fa-book-reader"></i>
                <span> Internship Visit Notes</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

    <?php } ?>