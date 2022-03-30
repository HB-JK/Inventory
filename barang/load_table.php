<?php 
	include '../config.php';

	$sql = "SELECT * FROM tableitem";
	$q = mysqli_query($mysqli, $sql);
	$num = mysqli_num_rows($q);

	$jumlahData = 10;
	$jumlahHalaman = ceil($num / $jumlahData);

	$active = 0;

	if(isset($_POST['page'])){
		if($_POST['page'] > $jumlahHalaman){
			$active = $jumlahHalaman;
		}else{
			$active = $_POST['page'];
		}
	}else{
		$active = 1;
	}

	$index = ($jumlahData * $active - $jumlahData);

	$sqlshow = "SELECT * FROM tableitem LIMIT $index, $jumlahData";
	$qshow = mysqli_query($mysqli, $sqlshow);

 ?>
 	<div class="navigation mt-5 mb-2">
 		<div class="row justify-content-center">
 			<input type="hidden" name="active" id="active" value="<?= $active ?>">

 			<?php if($jumlahHalaman > 1): ?>
 				<button class="btn btn-light" name="pKiri" id="pKiri" onclick="awal()">&laquo;</button>
				<button class="btn btn-light" name="kiri" id="kiri" onclick="kurang()">&lt;</button>
 			<?php endif; ?>

 			<?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
 				<?php if($i == $active): ?>
 					<input type="button" class="btn btn-light active" value="<?= $i ?>" onclick="loadTable(this.value)">
 				<?php else: ?>
 					<input type="button" class="btn btn-light" value="<?= $i ?>" onclick="loadTable(this.value)">
 				<?php endif; ?>
 			<?php endfor; ?>

 			<?php if($jumlahHalaman > 1) : ?>
				<button class="btn btn-light" name="kanan" id="kanan" onclick="tambah(<?= $jumlahHalaman ?>)">&gt;</button>
				<button class="btn btn-light" name="pKanan" id="pKanan" onclick="akhir(<?= $jumlahHalaman ?>)">&raquo;</button>
			<?php endif; ?>

 		</div>
 	</div>
 	<table class="table table-hover">
 		<thead>
 			<th>Nama</th>
 			<th>Satuan</th>
 			<th>stock</th>
 			<th>Harga</th>
 			<th>Cashback</th>
 			<th>harga_khusus</th>
 			<th>diskon</th>
 			<th>Action</th>
 		</thead>
 		<tbody>
 			<?php 
 				while($res = mysqli_fetch_array($qshow)){
 					$harga = number_format($res['harga_list'], 0, '', ',');
 					$cashback = number_format($res['cashback'], 0, '', ',');
 					$harga_khusus = number_format($res['harga_khusus'], 0, '', ',');
 			?>
 				<tr>
 					<td><?= $res['nama'] ?></td>
 					<td><?= $res['satuan'] ?></td>
 					<td><?= $res['stock'] ?></td>
 					<td><?= $harga ?></td>
 					<td><?= $cashback ?></td>
 					<td><?= $harga_khusus ?></td>
 					<td><?= $res['diskon'] ?></td>
 					<td><a class="edit" style="cursor: pointer" onclick="edit_form(<?= $res['id'] ?>)">Edit</a> | <a onclick="deleteConfirmation(<?= $res['id'] ?>)" class="delete" style="cursor:pointer">Delete</a></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>