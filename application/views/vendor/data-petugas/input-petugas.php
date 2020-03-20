<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Data Petugas</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Petugas</li>
      <li class="breadcrumb-item active" aria-current="page">Input Petugas</li>
    </ol>
  </div>

<!-- Horizontal Form -->
<div class="card mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Form Input Data Petugas</h6>
  </div><hr>
  <div class="card-body">
    <?php echo form_open_multipart('vendor/data_petugas/aksi_input', array('role'=>'form')); ?>
      
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Petugas</label>
        <div class="col-sm-9">
          <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required="required">
          <input type="checkbox" id="show-pass" name="show-pass"/> Lihat password
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Level</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="level" required="required">
              <option>-- Pilih Level --</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
          </select>
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
<script>
(function() {
    var _show = function( element, field ) {
        this.element = element;
        this.field = field;
        this.toggle();    
    };
    _show.prototype = {
        toggle: function() {
            var self = this;
            self.element.addEventListener( "change", function() {
                if( self.element.checked ) {
                    self.field.setAttribute( "type", "text" );
                } else {
                    self.field.setAttribute( "type", "password" );    
                }
            }, false);
        }
    };
    
    document.addEventListener( "DOMContentLoaded", function() {
        var checkbox = document.querySelector( "#show-pass" ),
            pass = document.querySelector( "#pass" ),
            _form = document.querySelector( "form" );
            var toggler = new _show( checkbox, pass );
    });
})();
</script>
  <?php $this->load->view('vendor/inc/footer.php'); ?>
