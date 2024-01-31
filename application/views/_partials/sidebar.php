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

<<<<<<< HEAD
<<<<<<< HEAD
        <li class="nav-item <?php echo $this->uri->segment(2) == 'DataPeserta' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin/DataPeserta/'); ?>">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Data Prakerin</span></a>
        </li>
=======
=======
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6
            <li class="nav-item <?php echo $this->uri->segment(2) == 'PelaksanaanPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PelaksanaanPKL/'); ?>">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Pelaksanaan Prakerin</span></a>
            </li>
<<<<<<< HEAD
>>>>>>> 13f5f182d084667ecb6fa4b575f75b9238f511d1
=======
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6

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
<<<<<<< HEAD
=======

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
>>>>>>> e7d0a276b510e196485f098a0fbb41f6841443e9
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

<<<<<<< HEAD
        </ul>
        <!-- End of Sidebar -->
=======
    </ul>

    <!-- End of Sidebar -->

    <?php  } ?>

    <?php if ($this->session->userdata("role") === "pembimbing_mentor") { ?>

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url('pembimbingmentor/Dashboard/'); ?>">
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

    <li class="nav-item <?php echo $this->uri->segment(2) == 'ValidasiJurnalPKL' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pembimbingmentor/ValidasiJurnalPKL'); ?>">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Validasi Logbook Prakerin</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'AbsensiPKL' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pembimbingmentor/AbsensiPKL'); ?>">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Absensi Peserta Prakarin</span></a>
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
>>>>>>> e7d0a276b510e196485f098a0fbb41f6841443e9

    <?php } ?>

    <?php if ($this->session->userdata("role") === "peserta") { ?>

<<<<<<< HEAD
<<<<<<< HEAD
    <div class="sidebar-heading" style="color: white;">
        Catatan Kegiatan Prakerin Peserta
    </div>
=======
=======
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('siswa/Dashboard/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman Siswa</p>
<<<<<<< HEAD
>>>>>>> 13f5f182d084667ecb6fa4b575f75b9238f511d1
=======
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

<<<<<<< HEAD
<<<<<<< HEAD
    <li class="nav-item <?php echo $this->uri->segment(2) == 'AbsensiPKL' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pembimbingmentor/AbsensiPKL'); ?>">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Absensi Peserta Prakarin</span></a>
    </li>
=======
        <div class="sidebar-heading" style="color: white;">
            Pengajuan Prakerin
        </div>
>>>>>>> 13f5f182d084667ecb6fa4b575f75b9238f511d1
=======
        <div class="sidebar-heading" style="color: white;">
            Pengajuan Prakerin
        </div>
=======
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url('peserta/Dashboard/'); ?>">
        <div class="sidebar-brand-icon">
            <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
        </div>
    </a>
    <p class="text-center text-white text-uppercase font-weight-bold">Halaman Peserta</p>
>>>>>>> e7d0a276b510e196485f098a0fbb41f6841443e9
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6

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

<<<<<<< HEAD
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Kegiatan Prakerin
        </div>
=======
    <li class="nav-item <?php echo $this->uri->segment(2) == 'InfoMentor' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/InfoMENTOR'); ?>">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Info Mentor</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'PermohonanPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/PermohonanPKL'); ?>">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Permohonan Prakerin</span></a>
    </li>
>>>>>>> e7d0a276b510e196485f098a0fbb41f6841443e9

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

<<<<<<< HEAD
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

<<<<<<< HEAD
<<<<<<< HEAD
    <?php if ($this->session->userdata("role") === "peserta") { ?>

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url('peserta/Dashboard/'); ?>">
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

    <li class="nav-item <?php echo $this->uri->segment(2) == 'PermohonanPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/PermohonanPKL'); ?>">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Permohonan Prakerin</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading" style="color: white;">
        Kegiatan Prakerin
    </div>

=======
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
=======
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6
    <li class="nav-item <?php echo $this->uri->segment(2) == 'JurnalPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/JurnalPKL'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Logbook Prakerin</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'ProgramPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/ProgramPKL'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Program Prakerin</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'PresensiPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/PresensiPKL'); ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Presensi Prakerin</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'CatatanKunjunganPKL' ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('peserta/CatatanKunjunganPKL'); ?>">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Catatan Kunjungan Prakerin</span></a>
    </li>
<<<<<<< HEAD

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <hr class="sidebar-divider">
=======
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
>>>>>>> 13f5f182d084667ecb6fa4b575f75b9238f511d1
=======
>>>>>>> e7d0a276b510e196485f098a0fbb41f6841443e9
>>>>>>> 44ebd7484cdb6bbd420d2a3dd845aec3f3deceb6

        <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

    <?php } ?>
