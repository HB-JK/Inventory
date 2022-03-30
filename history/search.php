<?php 
	require '../config.php';

	$action = $_POST['action'];

	if($action == 1){
		$search = $_POST['search'];
		$sql = "SELECT * FROM tbhistory WHERE no_faktur LIKE '%$search%'";
		$q = mysqli_query($mysqli, $sql);
?>
	<table class="table table-dark">
 		<thead>
 			<th>No.Faktur</th>
 			<th>Customer</th>
 			<th>No.Kendaraan</th>
 			<th>GrandTotal</th>
 			<th>Tanggal</th>
 			<th>Item</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($res = mysqli_fetch_array($q)) {
 				    $grandtotal = number_format($res['grandtotal'], 0, '', ',');
 				    $tanggal = date("d/m/Y", strtotime($res['tanggal']));

 			?>
 				<tr >
 					<td><?= $res['no_faktur'] ?></td>
 					<td><?= $res['customer'] ?></td>
 					<td><?= $res['no_kendaraan'] ?></td>
 					<td><?= $grandtotal ?></td>
 					<td><?= $tanggal ?></td>
 					<td><button class="btn btn-success" name="item" id="item" onclick="view(<?= $res['no_jual'] ?>)">View</button></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
<?php 
	}elseif($action == 2){
		$search = $_POST['search'];
		$sql = "SELECT * FROM tbhistory WHERE customer LIKE '%$search%'";
		$q = mysqli_query($mysqli, $sql);
?>
	<table class="table table-dark">
 		<thead>
 			<th>No.Faktur</th>
 			<th>Customer</th>
 			<th>No.Kendaraan</th>
 			<th>GrandTotal</th>
 			<th>Tanggal</th>
 			<th>Item</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($res = mysqli_fetch_array($q)) {
 				    $grandtotal = number_format($res['grandtotal'], 0, '', ',');
 				    $tanggal = date("d/m/Y", strtotime($res['tanggal']));

 			?>
 				<tr >
 					<td><?= $res['no_faktur'] ?></td>
 					<td><?= $res['customer'] ?></td>
 					<td><?= $res['no_kendaraan'] ?></td>
 					<td><?= $grandtotal ?></td>
 					<td><?= $tanggal ?></td>
 					<td><button class="btn btn-success" name="item" id="item" onclick="view(<?= $res['no_jual'] ?>)">View</button></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
<?php
	}elseif($action == 3){
		$search = $_POST['search'];
		$sql = "SELECT * FROM tbhistory WHERE no_kendaraan LIKE '%$search%'";
		$q = mysqli_query($mysqli, $sql);
?>
	<table class="table table-dark">
 		<thead>
 			<th>No.Faktur</th>
 			<th>Customer</th>
 			<th>No.Kendaraan</th>
 			<th>GrandTotal</th>
 			<th>Tanggal</th>
 			<th>Item</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($res = mysqli_fetch_array($q)) {
 				    $grandtotal = number_format($res['grandtotal'], 0, '', ',');
 				    $tanggal = date("d/m/Y", strtotime($res['tanggal']));

 			?>
 				<tr >
 					<td><?= $res['no_faktur'] ?></td>
 					<td><?= $res['customer'] ?></td>
 					<td><?= $res['no_kendaraan'] ?></td>
 					<td><?= $grandtotal ?></td>
 					<td><?= $tanggal ?></td>
 					<td><button class="btn btn-success" name="item" id="item" onclick="view(<?= $res['no_jual'] ?>)">View</button></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
<?php
	}else{
		$search = $_POST['search'];
		$sql = "SELECT * FROM tbhistory WHERE tanggal LIKE '%$search%'";
		$q = mysqli_query($mysqli, $sql);
?>
	<table class="table table-dark">
 		<thead>
 			<th>No.Faktur</th>
 			<th>Customer</th>
 			<th>No.Kendaraan</th>
 			<th>GrandTotal</th>
 			<th>Tanggal</th>
 			<th>Item</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($res = mysqli_fetch_array($q)) {
 				    $grandtotal = number_format($res['grandtotal'], 0, '', ',');
 				    $tanggal = date("d/m/Y", strtotime($res['tanggal']));

 			?>
 				<tr >
 					<td><?= $res['no_faktur'] ?></td>
 					<td><?= $res['customer'] ?></td>
 					<td><?= $res['no_kendaraan'] ?></td>
 					<td><?= $grandtotal ?></td>
 					<td><?= $tanggal ?></td>
 					<td><button class="btn btn-success" name="item" id="item" onclick="view(<?= $res['no_jual'] ?>)">View</button></td>
 				</tr>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
<?php
	}
 ?>