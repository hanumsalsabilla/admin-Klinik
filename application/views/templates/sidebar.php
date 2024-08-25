<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-google"></i>
        </div>
        <div class="sidebar-brand-text mx-3">goKlinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    if ($title == 'Dashboard') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>
    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../Admin'>";
    } else {
        echo "<a class='nav-link pb-0' href='Admin'>";
    }
    ?>
    <i class="fas fa-home"></i>
    <span>Beranda</span></a>
    </li>

    <?php
    if ($title == 'Jadwal Konsultasi') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>
    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../JadwalKonsultasi'>";
    } else {
        echo "<a class='nav-link pb-0' href='JadwalKonsultasi'>";
    }
    ?>

    <i class="fas fa-calendar"></i>
    <span>Jadwal Konsultasi</span></a>
    </li> <span></span></a>
    </li>

    <?php
    if ($title == 'Konsultasi Selesai') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>
    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../KonsultasiSelesai'>";
    } else {
        echo "<a class='nav-link pb-0' href='KonsultasiSelesai'>";
    }
    ?>

    <i class="fas fa-check"></i> <span>Konsultasi Selesai</span></a>
    </li> <span></span></a>
    </li>



    <?php
    if ($title == 'Pasien') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>
    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../Pasien'>";
    } else {
        echo "<a class='nav-link pb-0' href='Pasien'>";
    }
    ?>

    <i class="fas fa-user-injured"></i>
    <span>Pasien</span></a>
    </li> <span></span></a>
    </li>

    <?php
    if ($title == 'Jadwal Dokter' || $title == 'Edit Jadwal Dokter') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>

    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../JadwalDokter'>";
    } else {
        echo "<a class='nav-link pb-0' href='JadwalDokter'>";
    }
    ?>
    <i class="fas fa-user-md"></i>
    <span>Jadwal Dokter</span></a>
    </li>


    <?php
    if ($title == 'Dokter' || $title == 'Edit Dokter') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>

    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../Dokter'>";
    } else {
        echo "<a class='nav-link pb-0' href='Dokter'>";
    }
    ?>
    <i class="fas fa-user-md"></i>
    <span>Dokter</span></a>
    </li>
    <?php
    if ($title == 'Obat' || $title == 'Edit Obat') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>


    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../Obat'>";
    } else {
        echo "<a class='nav-link pb-0' href='Obat'>";
    }
    ?>

    <i class="fas fa-pump-medical"></i>
    <span>Obat</span></a>
    </li>
    <?php
    if ($title == 'Kurir') {
        echo "<li class='nav-item active'>";
    } else {
        echo "<li class='nav-item'>";
    }
    ?>

    <?php
    if ($kembali == 'kembali') {
        echo "<a class='nav-link pb-0' href='../../Kurir'>";
    } else {
        echo "<a class='nav-link pb-0' href='Kurir'>";
    }
    ?>
    <i class="fas fa-motorcycle"></i>
    <span>Kurir</span></a>
    </li>

    <hr class="sidebar-divider mt-3">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End  of Sidebar -->