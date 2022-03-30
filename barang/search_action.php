<?php 
	include_once('../config.php');
	$input = $_POST['search'];

	$sql = "SELECT * FROM tableitem WHERE nama LIKE '%$input%'";
	$q = mysqli_query($mysqli, $sql);
	$check = mysqli_num_rows($q);
	if($check >= 1){
?>
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
 				while($res = mysqli_fetch_array($q)){
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

<?php 
	}else{
?>
		<table class="table">
			<thead>
				<th class="fs-3">Silahkan input ulang detail item yang ingin anda cari</th>
			</thead>
		</table>
<?php 
	}