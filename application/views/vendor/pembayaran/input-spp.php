<table class="table align-items-center table-flush table-hover">
	<button type="button" data-toggle="modal" data-target="#tambah" id="#myBtn" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Input Pembayaran</button><br><br>
	<thead class="thead-light">
		<tr>
			<th>Bulan</th>
			<th>Tagihan SPP</th>
			<th>Jumlah Bayar</th>
			<th>Status</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Bulan</th>
			<th>Tagihan SPP</th>
			<th>Jumlah Bayar</th>
			<th>Status</th>
		</tr>
	</tfoot>
	<tbody>
		<?php if(!empty($siswa2)){
			foreach($siswa2 as $data){ ?>
				<tr>
					<td><?= $data->bulan_dibayar; ?></td>
					<td>Rp<?= rupiah($data->nominal); ?></td>
					<td>Rp<?= rupiah($data->jumlah_bayar); ?></td>
					<td>
						<?php if($data->nominal == $data->jumlah_bayar){ ?>
							<span class="btn btn-success" style="padding: 2px;">Lunas</span>
						<?php }else{  ?>
							<span class="btn btn-danger" style="padding: 2px;">Nunggak</span>
						<?php } ?>
          </td>
				</tr>
			<?php }
		}else{
			echo "<tr><td colspan='3'>Data tidak ada</td></tr>";
		} ?>
	</tbody>
</table>

<!-- MODAL TAMBAH -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Input Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form action="<?= site_url('vendor/transaksi_pembayaran/aksi_input'); ?>" method="POST">
          	<input type="hidden" name="id_petugas" value="<?= $this->session->userdata('user_id'); ?>">
          	<?php if(!empty($siswa)){
          	foreach($siswa as $data){ ?>	
				<input type="hidden" name="nis" value="<?= $data->nis; ?>">
				<input type="hidden" name="id_spp" value="<?= $data->id_spp; ?>">
          	<?php }
          	}else{} ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal Bayar</label>
              <div class="col-sm-9">
                <input id="tanggall" name="tgl" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
            	<label class="col-sm-3 col-form-label">Bulan Bayar</label>
            	<div class="col-sm-9">
            		<select class="form-control select2" name="bulan_dibayar" required="required"  style="width: 100%;">
            			<option>-- Pilih Bulan --</option>
            			<option value="Januari">Januari</option>
            			<option value="Februari">Februari</option>
            			<option value="Maret">Maret</option>
            			<option value="April">April</option>
            			<option value="Mei">Mei</option>
            			<option value="Juni">Juni</option>
            			<option value="Juli">Juli</option>
            			<option value="Agustus">Agustus</option>
            			<option value="September">September</option>
            			<option value="Oktober">Oktober</option>
            			<option value="November">November</option>
            			<option value="Desember">Desember</option>
            		</select>
            	</div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun Bayar</label>
              <div class="col-sm-9">
                <input type="text" name="tahun_dibayar" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jumlah Bayar</label>
              <div class="col-sm-9">
                <input type="text" name="jumlah_bayar" class="form-control" required="required">
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
