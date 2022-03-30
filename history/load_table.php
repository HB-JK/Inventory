<?php 
	require '../config.php';

	$qdata = mysqli_query($mysqli, "SELECT * FROM tbhistory");
	$totalData = mysqli_num_rows($qdata);

	$jumlahData = 10;
	$jumlahHalaman = ceil($totalData / $jumlahData);

	$active = ( isset($_POST['page'])) ? $_POST['page'] : 1;
	$index = ($jumlahData * $active - $jumlahData);

	$sqlshow = "SELECT * FROM tbhistory LIMIT $index, $jumlahData";
	$qshow = mysqli_query($mysqli, $sqlshow);
 ?>
 	<table class="table table-dark">
 		<thead>
 			<th>No.Faktur</th>
 			<th>Customer</th>
 			<th>No.Kendaraan</th>
 			<th>GrandTotal</th>
 			<th>Tanggal</th>
 			<th>Item</th>
 			<th>SJ</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($res = mysqli_fetch_array($qshow)) {
 				    $grandtotal = number_format($res['grandtotal'], 0, '', ',');
 				    $tanggal = date("d/m/Y", strtotime($res['tanggal']));
 				    $no_faktur = $res['no_faktur'];

 			?>
 				<tr >
 					<td><?= $res['no_faktur'] ?></td>
 					<td><?= $res['customer'] ?></td>
 					<td><?= $res['no_kendaraan'] ?></td>
 					<td><?= $grandtotal ?></td>
 					<td><?= $tanggal ?></td>
 					<td><button class="btn btn-success" name="item" id="item" onclick="view(<?= $res['no_jual'] ?>)">View</button></td>
 					<td><button class="btn btn-primary" name="sj" id="sj" onclick="viewsj('<?= $no_faktur; ?>')">Print</button></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
 	<div class="navigation">
 		<div class="row justify-content-center">
 			<input type="hidden" name="active" id="active" value="<?= $active ?>">
 			
			<?php if($jumlahHalaman > 1) : ?>
				<button class="btn btn-light" name="pKiri" id="pKiri" onclick="awal()">&laquo;</button>
				<button class="btn btn-light" name="kiri" id="kiri" onclick="kurang()">&lt;</button>
			<?php endif; ?>

 			<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
 				<?php if($i == $active) : ?>
 					<input type="button" class="btn btn-light active" value="<?= $i ?>" onclick="loadTable(this.value)">
 				<?php else: ?>
 					<input type="button" class="btn btn-light" onclick="loadTable(this.value)" value="<?= $i ?>">
 				<?php endif; ?>
 			<?php endfor; ?>

			<?php if($jumlahHalaman > 1) : ?>
				<button class="btn btn-light" name="kanan" id="kanan" onclick="tambah(<?= $jumlahHalaman ?>)">&gt;</button>
				<button class="btn btn-light" name="pKanan" id="pKanan" onclick="akhir(<?= $jumlahHalaman ?>)">&raquo;</button>
			<?php endif; ?>

 		</div>
 	</div>