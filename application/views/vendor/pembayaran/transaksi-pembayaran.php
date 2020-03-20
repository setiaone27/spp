<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<style>
  .dropify-wrapper {
    width: 100%;
  }
</style>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Transaksi Pembayaran</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Transaksi Pembayaran</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header"><br>
          <span class="font-weight-bold">Cari Siswa</span>&nbsp;&nbsp; <input type="text" id="keyword" placeholder="Masukkan NIS Siswa" style="border-radius: 5px;">
          <button type="button" class="btn btn-primary" id="btn-search">Cari</button>
          <a href="<?= base_url('vendor/transaksi-pembayaran'); ?>" class="btn btn-warning">Reset</a>
        </div><hr>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card mb-4">
        <div class="card-header">
            <div class="table-responsive p-3" id="view">
              <?php $this->load->view('vendor/pembayaran/table-input-pembayaran'); ?>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="col-lg-7">
        <div class="card mb-4">
          <div class="card-header">
            <div class="table-responsive p-3" id="view2">
              <?php $this->load->view('vendor/pembayaran/input-spp'); ?>
            </div>
          </div>
        </div>
      </div>
              

  </div>
  <!--Row-->

  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>