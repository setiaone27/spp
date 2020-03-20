<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Data Siswa</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Siswa</li>
      <li class="breadcrumb-item active" aria-current="page">Input Siswa</li>
    </ol>
  </div>

<!-- Horizontal Form -->
<div class="card mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Form Input Data Siswa</h6>
  </div><hr>
  <div class="card-body">
    <?php echo form_open_multipart('vendor/data_siswa/aksi_input', array('role'=>'form')); ?>
      <input type="hidden" name="level" value="siswa">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">NIS</label>
        <div class="col-sm-9">
          <input type="number" name="nis" class="form-control" placeholder="NIS" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Siswa</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Password Siswa</label>
        <div class="col-sm-9">
          <input name="password" class="form-control" placeholder="Password Siswa" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Kelas</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="id_kelas" required="required">
              <option>-- Pilih Kelas --</option>
            <?php foreach($kelas->result() as $row){ ?>
              <option value="<?= $row->id_kelas; ?>"><?= $row->nama_kelas; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tahun SPP</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="id_spp" required="required">
              <option>-- Pilih Tahun SPP --</option>
            <?php foreach($spp->result() as $row){ ?>
              <option value="<?= $row->id_spp; ?>"><?= $row->tahun; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">No Telepon</label>
        <div class="col-sm-9">
          <input type="text" name="no_tlp" class="form-control" placeholder="No Telepon" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
          <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
        </div>
      </div><br>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>