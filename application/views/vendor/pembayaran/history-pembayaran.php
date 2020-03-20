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
    <h1 class="h3 mb-0 text-gray-800">History Pembayaran</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">History Pembayaran</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
        </div><hr>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tahun Ajaran</th>
                <th>Tanggal Bayar</th>
                <th>Tahun Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Petugas</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tahun Ajaran</th>
                <th>Tanggal Bayar</th>
                <th>Tahun Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Petugas</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                $no = 1;
                foreach ($list as $row) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>                
                <td><?= $row->nis; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->tahun; ?></td>
                <td><?= $row->tgl; ?></td>
                <td><?= $row->tahun_dibayar; ?></td>
                <td><?= rupiah($row->jumlah_bayar); ?></td>
                <td><?= $row->nama_petugas; ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->


  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>