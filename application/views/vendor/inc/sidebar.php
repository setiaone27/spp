<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('assets/admin/img/logo/sppqu.png'); ?>">
    </div>
    <div class="sidebar-brand-text mx-3">SPPQu</div>
    
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item ">
    <a class="nav-link" href="<?= site_url('vendor/dashboard'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <?php if ($this->session->userdata('user_level') == 'admin') { ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Data Utama
    </div>
    <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-credit-card"></i>
      <span>SPP</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Siswa</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-spp'); ?>">Data SPP</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-spp'); ?>">Input Data SPP</a>
      </div>
    </div>
  </li>
  <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-users"></i>
      <span>Siswa</span>
    </a>
    <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Siswa</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-siswa'); ?>">Data Siswa</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-siswa'); ?>">Input Data Siswa</a>
      </div>
    </div>
  </li>
  <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-server"></i>
      <span>Kelas</span>
    </a>
    <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelas</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-kelas'); ?>">Data Kelas</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-kelas'); ?>">Input Data Kelas</a>
      </div>
    </div>
  </li>
  <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-university"></i>
      <span>Kompetensi Keahlian</span>
    </a>
    <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kompetensi Keahlian</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-kompetensi-keahlian'); ?>">Data Kompetensi Keahlian</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-kompetensi-keahlian'); ?>">Input Kompetensi Keahlian</a>
      </div>
    </div>
  </li>
  <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Petugas</span>
    </a>
    <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Petugas</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-petugas'); ?>">Data Petugas</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-petugas'); ?>">Input Data Petugas</a>
      </div>
    </div>
  </li>
  <?php
    } else{
      echo "";
    }
    ?>
    
<hr class="sidebar-divider">
<div class="sidebar-heading">
  Pembayaran
</div>
<?php if ($this->session->userdata('user_level') == 'admin' ){ ?>
<li class="nav-item ">
  <a class="nav-link" href="<?= site_url('vendor/transaksi-pembayaran'); ?>">
    <i class="fas fa-fw fa-archive"></i>
    <span>Transaksi Pembayaran</span>
  </a>
</li>
<?php }else if($this->session->userdata('user_level') == 'petugas' ){ ?>
<li class="nav-item ">
  <a class="nav-link" href="<?= site_url('vendor/transaksi-pembayaran'); ?>">
    <i class="fas fa-fw fa-archive"></i>
    <span>Transaksi Pembayaran</span>
  </a>
</li>
    <?php }else{
      echo "";
    }
    ?>
<li class="nav-item ">
  <a class="nav-link" href="<?= site_url('vendor/history-pembayaran'); ?>">
    <i class="fas fa-fw fa-history"></i>
    <span>History Pembayaran</span>
  </a>
</li>
<?php if ($this->session->userdata('user_level') == 'admin') { ?>
<li class="nav-item ">
  <a class="nav-link" href="<?= site_url('vendor/cetak-laporan'); ?>">
    <i class="fas fa-fw fa-print"></i>
    <span>Cetak Laporan</span>
  </a>
</li>
<?php
    } else{
      echo "";
    }
    ?>
<hr class="sidebar-divider">
<div class="version">Version 1.0.0</div>
</ul>
    <!-- Sidebar -->