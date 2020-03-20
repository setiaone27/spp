<html>
<head>
	<link href="<?= base_url('assets/admin/img/logo/litetekno.png'); ?>" rel="icon">
	<title>SPPQu - <?= $title; ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap336.css'); ?>">
	<style type="text/css">
		@media print {
			body {-webkit-print-color-adjust: exact;font-size: 12px;} 
			span,p,td{font-size: 12px;}
		}
		body {-webkit-print-color-adjust: exact;font-size: 12px;} 
		span,p,td,th{font-size: 12px;}
		.tabel-label tr td{
			padding: 5px;
		}
		.atas{
			padding: 10px 20px;
			background-color: #274496 !important; 
			-webkit-print-color-adjust: exact; 
		}
		.detail-pesan{margin-bottom: 20px}
		.cl0{color: #fff !important;font-size: 24px;-webkit-print-color-adjust: exact; }
		.bg-default{background-color: #FFF !important;-webkit-print-color-adjust: exact;} 
		.box{border: 1px solid #eee;padding: 10px}
		.box .box-body{padding: 5px;}
		.h-60{height: 60px}
	</style>
</head>

<body onload="window.print();">
	<div class="atas"> 
	</div>
	<div class="detail-pesan">
		<div class="row">
			<h3 class="text-center"><b>Laporan Pembayaran</b></h3><br/>
			<div class="col-xs-6"> 
				<div class="box">
					<table class="tabel-label">
						<?php foreach($list as $row){ ?>
						<tr>
							<td><b>NIS</b></td>
							<td>:</td>
							<td><b><?= $row->nis; ?></b></td>
						</tr>
						<tr>
							<td><b>Nama Siswa</b></td>
							<td>:</td>
							<td><?= $row->nama; ?></td>
						</tr>
						<tr>
							<td><b>Kelas</b></td>
							<td>:</td>
							<td><?= $row->nama_kelas; ?></td>
						</tr>
					<?php } ?>
					</table> 
				</div>
			</div>
			<div class="col-xs-6"> 
				<div class="box">
					<table class="tabel-label"> 
						<?php foreach($list2 as $row){ ?>
						<?php } ?>	
						<tr>
							<td><b>Tahun Ajaran</b></td>
							<td>:</td>
							<td><?= $row->tahun; ?></td>
						</tr> 
						<tr>
							<td><b>Nominal Bayar</b></td>
							<td>:</td>
							<td><b><?= rupiah($row->nominal); ?></b></td>
						</tr>
						<tr>
							<td><b>Diterima Oleh</b></td>
							<td>:</td>
							<td><?= $row->nama_petugas; ?> - <?= $row->level; ?></td>
						</tr>
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="isi-pesan">
		<div class="table-table-responsive">
			<table class="table table-bordered table-striped">
				<thead class="bg-default">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Tanggal Bayar</th>
						<th class="text-center">Bulan Bayar</th>
						<th class="text-center">Tahun Bayar</th>
						<th class="text-center">Jumlah Bayar</th>
						<th class="text-center">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach($list2 as $row){ ?>
					<tr>
						<td class="text-center"><?= $no++; ?></td>
						<td class="text-center"><?= $row->tgl; ?></td>
						<td class="text-center"><?= $row->bulan_dibayar; ?></td>
						<td class="text-center"><?= $row->tahun_dibayar; ?></td>
						<td class="text-right"><?= rupiah($row->jumlah_bayar); ?></td>
						<td class="text-right">
							<?php if($row->nominal == $row->jumlah_bayar){ ?>
								<b>Lunas</b>
							<?php }else{  ?>
								<b>Nunggak</b>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

	<div class="text-center"><hr/>
		<img src="https://i0.wp.com/www.dwiguna.info/wp-content/uploads/2018/04/LOGO-SMK-DWIGUNA-PNG.png?ssl=1" style="height: 70px;"><br/>
		<i>SMK TI DWIGUNA DEPOK</b></i><br/>
		<i>JL. Raya Citayam Gang, Jl. H. Dul No.100, Bojong Pd. Terong, Kec. Cipayung, Kota Depok, Jawa Barat 16444</i>
	</div>
</body>
</html>

