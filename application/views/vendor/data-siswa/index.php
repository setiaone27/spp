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
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Siswa</li>
      <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
        </div><hr>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun SPP</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun SPP</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                $no = 1;
                foreach ($list as $row) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nis; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->nama_kelas; ?></td>
                <td><?= $row->tahun; ?></td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#detail<?= $row->nis; ?>" id="#modalScroll" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                  <button type="button" data-toggle="modal" data-target="#edit<?= $row->nis; ?>" id="#myBtn" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                  <button type="button" data-toggle="modal" data-target="#hapus<?= $row->nis; ?>" id="#myBtn" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
  foreach ($list as $modal) {
    ?>
  <!-- MODAL DETAILS -->
  <div class="modal fade" id="detail<?= $modal->nis; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Siswa NIS: <?= $modal->nis; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIS</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nis; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama_kelas; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun SPP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->tahun; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Telp</label>
              <div class="col-sm-9">
                <textarea class="form-control" readonly="readonly"><?= $modal->no_tlp; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" readonly="readonly"><?= $modal->alamat; ?></textarea>
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
  foreach ($list as $modal) {
    ?>
  <!-- Modal EDIT -->
  <div class="modal fade" id="edit<?= $modal->nis; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Siswa NIS: <?= $modal->nis; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <?php echo form_open_multipart('vendor/data_siswa/aksi_edit/'.$modal->nis, array('role'=>'form')); ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIS</label>
              <div class="col-sm-9">
                <input type="text" name="nis" class="form-control" value="<?= $modal->nis; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" value="<?= $modal->nama; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="id_kelas" style="width: 100%;">
                  <option>-- Pilih Kelas --</option>
                  <?php foreach($kelas->result() as $row){ ?>
                    <option <?php if($modal->id_kelas == $row->id_kelas) echo 'selected'; ?> value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun SPP</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="id_spp" style="width: 100%;">
                  <option>-- Pilih Tahun SPP --</option>
                  <?php foreach($spp->result() as $row){ ?>
                    <option <?php if($modal->id_spp == $row->id_spp) echo 'selected'; ?> value="<?php echo $row->id_spp; ?>"><?php echo $row->tahun; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Telp</label>
              <div class="col-sm-9">
                <input type="text" name="no_tlp" class="form-control" value="<?= $modal->no_tlp; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat" class="form-control"><?= $modal->alamat; ?></textarea>
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
foreach ($list as $modalhapus) {
  ?>
<!-- MODAL HAPUS -->
<div class="modal fade" id="hapus<?= $modalhapus->nis; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
      <p>Yakin Anda Ingin Menghapus Siswa NIS : <?= $modalhapus->nis; ?></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      <a href="<?= site_url('vendor/data_siswa/hapussiswa/'.$modalhapus->nis); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    </div>
  </div>
</div>
</div>

<?php } ?>


  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>