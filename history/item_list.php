<?php 
	require '../config.php';
	$no_jual = $_GET['no_jual'];
	$sql = "SELECT * FROM tbhistoryitem WHERE no_jual=$no_jual";
	$q = mysqli_query($mysqli, $sql);
	$i = 1;
 ?>
 <!DOCTYPE html>
 <html>
<head>
	<title>Sumber Roda | Penjualan</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<style>
	.back{
		position: fixed;
		top: 2%;
		left: 2%;
	}
	
	.back a{
		font-weight: bold;
		font-size: 20px;
	}
</style>
 <body>
 	<div class="back">
 		<a href="../history.php" class="btn btn-danger">Back</a>
 	</div>

 	<div class="container mt-5">
 		<h2 class="mt-5">List Item Faktur</h2>
 		<table class="table">
 			<thead>
 				<th>No.</th>
 				<th>nama Produk/Barang</th>
 				<th>Satuan</th>
 				<th>Harga</th>
 				<th>Jumlah Item</th>
 				<th>Total Harga</th>
 			</thead>
 			<tbody>
 				<?php 
 					while($res = mysqli_fetch_array($q)){
 						$harga = number_format($res['harga'], 0, '', ',');
 						$total = number_format($res['total'], 0, '', ',');
 				?>
 				<tr>
 					<td><?= $i ?></td>
 					<td><?= $res['item'] ?></td>
 					<td><?= $res['satuan'] ?></td>
 					<td><?= $harga ?></td>
 					<td><?= $res['jumlah_item'] ?></td>
 					<td><?= $total ?></td>
 				</tr>

 				<?php
 						$i += 1; 
 					}
 				 ?>
 			</tbody>
 		</table>
 	</div>
 </body>
 </html>