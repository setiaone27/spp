<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
    </ol>
  </div>

  
  <!-- DATA SISWA -->
  
  <div class="row mb-3">
    <?php if ($this->session->userdata('user_level') == 'admin') { ?>
      <?php foreach($siswa as $row){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Siswa</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row->totalsiswa; ?></div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <a href="<?= site_url('vendor/data-siswa'); ?>"><span>Selengkapnya </span> <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-info"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- DATA KELAS -->
      <?php foreach($kelas as $row){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Kelas</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row->totalkelas; ?></div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <a href="<?= site_url('vendor/data-kelas'); ?>"><span>Selengkapnya </span> <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-building fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- DATA PETUGAS -->
      <?php foreach($kk as $row){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Kompetensi Keahlian</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row->totalkk; ?></div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <a href="<?= site_url('vendor/data-kompetensi-keahlian'); ?>"><span>Selengkapnya </span> <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-th-list fa-2x text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- DATA PETUGAS -->
      <?php foreach($petugas as $row){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Petugas</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row->totalpetugas; ?></div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <a href="<?= site_url('vendor/data-petugas'); ?>"><span>Selengkapnya </span> <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php
    } else{
      echo "";
    }
    ?>

    <?php if ($this->session->userdata('user_level') == 'admin') { ?>
      <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
            <a class="m-0 float-right btn btn-danger btn-sm" href="<?= site_url('vendor/history-pembayaran'); ?>">Lebih Banyak <i
              class="fas fa-chevron-right"></i></a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;
                  foreach($pembayaran as $row){ ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->nis; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $row->tgl; ?></td>
                      <td><?php echo $row->nama_petugas; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-5">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Kompetensi Keahlian</h6>
            </div>
            <div class="card-body">
              <?php foreach($kompetensi as $row){ ?>
                <div class="mb-3">
                  <div class="small text-gray-500"><?php echo $row->nama_kk; ?>
                  <!-- <div class="small float-right"><b>25 Orang</b></div> -->
                </div>
            <!-- <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
          </div>
        <?php } ?>
      </div>
      <div class="card-footer text-center">
        <?php if ($this->session->userdata('user_level') == 'admin') { ?>
          <a class="m-0 small text-primary card-link" href="<?= site_url('vendor/data-kompetensi-keahlian'); ?>">Selengkapnya <i class="fas fa-chevron-right"></i></a>
          <?php
        } else{
          echo "";
        }
        ?>
      </div>
    </div>
  </div>
<?php }else if($this->session->userdata('user_level') == 'petugas' ){ ?>
  <div class="col-xl-8 col-lg-7 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
        <a class="m-0 float-right btn btn-danger btn-sm" href="<?= site_url('vendor/history-pembayaran'); ?>">Lebih Banyak <i
          class="fas fa-chevron-right"></i></a>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tanggal Bayar</th>
                <th>Petugas</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($pembayaran as $row){ ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->nis; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->tgl; ?></td>
                  <td><?php echo $row->nama_petugas; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>

    <div class="col-xl-4 col-lg-5">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Kompetensi Keahlian</h6>
        </div>
        <div class="card-body">
          <?php foreach($kompetensi as $row){ ?>
            <div class="mb-3">
              <div class="small text-gray-500"><?php echo $row->nama_kk; ?>
              <!-- <div class="small float-right"><b>25 Orang</b></div> -->
            </div>
            <!-- <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
          </div>
        <?php } ?>
      </div>
      <div class="card-footer text-center">
        <?php if ($this->session->userdata('user_level') == 'admin') { ?>
          <a class="m-0 small text-primary card-link" href="<?= site_url('vendor/data-kompetensi-keahlian'); ?>">Selengkapnya <i class="fas fa-chevron-right"></i></a>
          <?php
        } else{
          echo "";
        }
        ?>
      </div>
    </div>
  </div>

<?php } else{ ?>
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header">
        <div class="table-responsive p-3" id="tampil">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <h6 class="h6 mb-0 btn btn-sm btn-success"><i class="fa fa-user"></i> Biodata Siswa</h6><br>
            <tbody>
                  <tr>
                    <th>NIS</th>
                    <td id="txt_fname">: <?= $this->session->userdata('user_name') ?></td>
                  </tr>
                  <tr>
                    <th>Nama</th>
                    <td id="txt_lname">: <?= $this->session->userdata('full_name') ?></td>
                  </tr>
                  <tr>
                    <th>No Telepon</th>
                    <td id="txt_email">: <?= $this->session->userdata('user_hp') ?></td>
                  </tr>
                  <tr>
                    <th>Alamat/th>
                    <td id="txt_position">: <?= $this->session->userdata('user_alamat') ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!--Row-->
<?php } ?>
</div>
<!---Container Fluid-->

<?php $this->load->view('vendor/inc/footer.php'); ?>