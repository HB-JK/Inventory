<?php 
	require '../config.php';

	if($_POST['pembayaran'] != ''){
		$pembayaran = $_POST['pembayaran'];
		$sql = "SELECT * FROM tbpenjualan";
		$q = mysqli_query($mysqli, $sql);
		$grandtotal = 0;
		$i = 1;
	 ?>
	 	<div id="line"></div>
	 	<table class="table table-borderless">
			<?php 
				while($res = mysqli_fetch_array($q)){
					$harga = number_format($res['harga'], 0, '', ',');
					$total = number_format($res['total'], 0, '', ',');
			?>
				<tr class="row">
					<td class="m-0 p-0" style="flex: 0 0 3%; max-width: 3%"><?= $i ?></td>
					<td class="col-md-5 m-0 p-0"><?= $res['item'] ?></td>
					<td class="col-md-1 m-0 p-0"><?= $res['jumlah_item'] ?></td>
					<td class="col-md-1 m-0 p-0"><?= $res['satuan'] ?></td>
					<td class="col-md-2 m-0 p-0"><?= $harga ?></td>
					<td class="col-md-2 m-0 p-0 right"><?= $total ?></td>
				</tr>
			<?php 	
					$i += 1;
					$grandtotal += $res['total'];
				}

				if($pembayaran == 'edc'){
					$grandtotal = $grandtotal - ($grandtotal * 0.01);
				}elseif($pembayaran == 'bca'){
					$grandtotal = $grandtotal - ($grandtotal * 0.015);
				}
			 ?>
	 	</table>
	 	#
	 	<?= $grandtotal ?>
	 	<?php 
	 		$grandtotal = number_format($grandtotal, 0, '', ',');
	 	 ?>
	 	 #
	 	<?= $grandtotal ?>
	<?php
	}else{
		$sql = "SELECT * FROM tbpenjualan";
		$q = mysqli_query($mysqli, $sql);
		$grandtotal = 0;
		$i = 1;
	 ?>
	 	<div id="line"></div>
	 	<table class="table table-borderless">
			<?php 
				while($res = mysqli_fetch_array($q)){
					$harga = number_format($res['harga'], 0, '', ',');
					$total = number_format($res['total'], 0, '', ',');
			?>
				<tr class="row">
					<td class="m-0 p-0" style="flex: 0 0 3%; max-width: 3%"><?= $i ?></td>
					<td class="col-md-5 m-0 p-0"><?= $res['item'] ?></td>
					<td class="col-md-1 m-0 p-0"><?= $res['jumlah_item'] ?></td>
					<td class="col-md-1 m-0 p-0"><?= $res['satuan'] ?></td>
					<td class="col-md-2 m-0 p-0"><?= $harga ?></td>
					<td class="col-md-2 m-0 p-0 right"><?= $total ?></td>
				</tr>
			<?php 	
					$i += 1;
					$grandtotal += $res['total'];
				}
			 ?>
	 	</table>
	 	#
	 	<?= $grandtotal ?>
	 	<?php 
	 		$grandtotal = number_format($grandtotal, 0, '', ',');
	 	 ?>
	 	 #
	 	<?= $grandtotal ?>
	 <?php 
	}