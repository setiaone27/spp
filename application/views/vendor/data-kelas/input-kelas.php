<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Data Kelas</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Kelas</li>
      <li class="breadcrumb-item active" aria-current="page">Input Kelas</li>
    </ol>
  </div>

<!-- Horizontal Form -->
<div class="card mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Form Input Data Kelas</h6>
  </div><hr>
  <div class="card-body">
    <?php echo form_open_multipart('vendor/data_kelas/aksi_input', array('role'=>'form')); ?>
      
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="id_kk" required="required">
              <option>-- Pilih Kompetensi Keahlian --</option>
            <?php foreach($kompetensi_keahlian->result() as $row){ ?>
              <option value="<?= $row->id_kk; ?>"><?= $row->nama_kk; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Kelas</label>
        <div class="col-sm-9">
          <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required="required">
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