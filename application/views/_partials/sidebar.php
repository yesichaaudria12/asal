    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <?php if ($this->session->userdata("role") === "admin_pkl") { ?>

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

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataSiswa' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataSiswa/'); ?>">
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

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PengajuanPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PengajuanPKL/'); ?>">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Pengajuan Prakerin</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PelaksanaanPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PelaksanaanPKL/'); ?>">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Pelaksanaan Prakerin</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading" style="color: white;">
                Penilaian Prakerin
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'PenilaianPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PenilaianPKL/'); ?>">
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
            Catatan Kegiatan Prakerin Siswa
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'ValidasiJurnalPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/ValidasiJurnalPKL'); ?>">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Validasi Logbook Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'AbsensiPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/AbsensiPKL'); ?>">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Absensi Siswa Prakarin</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Penilaian Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PenilaianPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingmentor/PenilaianPKL/'); ?>">
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

    <?php if ($this->session->userdata("role") === "siswa") { ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('siswa/Dashboard/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman Siswa</p>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Pengajuan Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'InfoMentor' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/InfoMENTOR'); ?>">
                <i class="fas fa-fw fa-info-circle"></i>
                <span>Info Company</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PermohonanPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/PermohonanPKL'); ?>">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Permohonan Prakerin</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Kegiatan Prakerin
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'JurnalPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/JurnalPKL'); ?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Logbook Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'ProgramPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/ProgramPKL'); ?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Program Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PresensiPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/PresensiPKL'); ?>">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Presensi Prakerin</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'CatatanKunjunganPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/CatatanKunjunganPKL'); ?>">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Catatan Kunjungan Prakerin</span></a>
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