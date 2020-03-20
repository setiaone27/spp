</div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <?= date('Y'); ?> - SPPQu
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/ruang-admin.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/demo/chart-area-demo.js'); ?>"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/gijgo/js/gijgo.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/select2/js/select2.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/dropify/dist/js/dropify.min.js'); ?>"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <script type="text/javascript">
        $(document).ready(function(){
            $(function () {
              $('#accordionSidebar a[href~="' + location.href + '"]')
              .parents('li')
              .addClass('active');
            });
            $(function(){
                $('.nav-item a[href~="' + location.href + '"]').addClass('active');
            });
        });
</script>
<?php if($this->session->flashdata('hapus') == TRUE):?>
<script type="text/javascript">
 Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $this->session->flashdata('hapus'); ?>',
  showConfirmButton: false,
  timer: 1700
})
</script>
<?php elseif($this->session->flashdata('input') == TRUE):?>
  <script type="text/javascript">
 Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $this->session->flashdata('input'); ?>',
  showConfirmButton: false,
  timer: 1700
})
</script>
<?php elseif($this->session->flashdata('edit') == TRUE):?>
  <script type="text/javascript">
 Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $this->session->flashdata('edit'); ?>',
  showConfirmButton: false,
  timer: 1700
})
</script>
<?php endif; ?>
<script>
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
  });
</script>
<script>
  $('#tanggall').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
  });
</script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
});
  $('.dropify').dropify();
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#btn-search").click(function(){
    $(this).html("Mencari...").attr("disabled", "disabled");
    var url = window.location.protocol + '//' + window.location.host + '/spp/';
    $.ajax({
      url: url+'vendor/transaksi_pembayaran/search',
      type: 'POST',
      data: {keyword: $("#keyword").val()},
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        
        $("#btn-search").html("Cari").removeAttr("disabled");
        
        $("#view").html(response.hasil);
        $("#view2").html(response.hasil2);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText);
      }
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#btn-cari").click(function(){
    $(this).html("Mencari...").attr("disabled", "disabled");
    var url = window.location.protocol + '//' + window.location.host + '/spp/';
    $.ajax({
      url: url+'vendor/cetak_laporan/search',
      type: 'POST',
      data: {keyword: $("#keyword").val()},
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        
        $("#btn-cari").html("Cari").removeAttr("disabled");
        
        $("#tampil").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText);
      }
    });
  });
});
</script>
</body>

</html>