<table class="table align-items-center table-flush table-hover" id="dataTableHover">
  <h6 class="h6 mb-0 btn btn-sm btn-success"><i class="fa fa-user"></i> Biodata Siswa</h6><br>
  <tbody>
    <?php if(!empty($siswa)){
      foreach($siswa as $data){ ?>
        <tr>
          <th>NIS</th>
          <td id="txt_fname">: <?= $data->nis; ?></td>
        </tr>
        <tr>
          <th>Nama</th>
          <td id="txt_lname">: <?= $data->nama; ?></td>
        </tr>
        <tr>
          <th>Kelas</th>
          <td id="txt_email">: <?= $data->nama_kelas; ?></td>
        </tr>
        <tr>
          <th>Tahun Ajaran</th>
          <td id="txt_position">: <?= $data->tahun; ?></td>
        </tr>
        <tr>
          <th>No Telpon</th>
          <td id="txt_position">: <?= $data->no_tlp; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td id="txt_position">: <?= $data->alamat; ?></td>
        </tr>
      
  </tbody>
</table>
<a href="<?php echo base_url('vendor/cetak_laporan/siswa/'.$data->nis); ?>" class="btn btn-info" target="_blank"><i class="fa fa-print" onload="window.print();"></i> Cetak Laporan Pembayaran</a>
<?php }
    }else{
      echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
    } ?>


