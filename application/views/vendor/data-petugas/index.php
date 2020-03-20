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
    <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Petugas</li>
      <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
        </div><hr>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                $no = 1;
                foreach ($list->result() as $row) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama_petugas; ?></td>
                <td><?= $row->username; ?></td>
                <td><h6 class="btn btn-sm btn-success"><?= $row->level; ?></h6></td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#detail<?= $row->id_petugas; ?>" id="#modalScroll" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                  <button type="button" data-toggle="modal" data-target="#edit<?= $row->id_petugas; ?>" id="#myBtn" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                  <button type="button" data-toggle="modal" data-target="#hapus<?= $row->id_petugas; ?>" id="#myBtn" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

  <?php 
  foreach ($list->result() as $modal) {
    ?>
  <!-- MODAL DETAILS -->
  <div class="modal fade" id="detail<?= $modal->id_petugas; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Petugas: <?= $modal->id_petugas; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Petugas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama_petugas; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->username; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Level</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->level; ?>" readonly="readonly">
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php 
  foreach ($list->result() as $modal) {
    ?>
  <!-- Modal EDIT -->
  <div class="modal fade" id="edit<?= $modal->id_petugas; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Petugas: <?= $modal->nama_petugas; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <?php echo form_open_multipart('vendor/data_petugas/aksi_edit/'.$modal->id_petugas, array('role'=>'form')); ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Petugas</label>
              <div class="col-sm-9">
                <input type="text" name="nama_petugas" class="form-control" value="<?= $modal->nama_petugas; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" name="username" class="form-control" value="<?= $modal->username; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="level" style="width: 100%;">
                  <option><?= $modal->level; ?></option>
                  <option>-- Pilih Level --</option>
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                </select>
              </div>
            </div><hr>
            
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
              <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-save"></i> Simpan</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php 
foreach ($list->result() as $modalhapus) {
  ?>
<!-- MODAL HAPUS -->
<div class="modal fade" id="hapus<?= $modalhapus->id_petugas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Yakin Anda Ingin Menghapus Petugas : <?= $modalhapus->nama_petugas; ?></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      <a href="<?= site_url('vendor/data_petugas/hapuspetugas/'.$modalhapus->id_petugas); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    </div>
  </div>
</div>
</div>

<?php } ?>


  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>