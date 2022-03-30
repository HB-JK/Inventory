<?php 
	include_once('config.php');

	$sqlshow = "SELECT * FROM tbpenjualan";
	$qshow = mysqli_query($mysqli, $sqlshow) or die($sqlshow);
	$num = 1;
 ?>
 <div class="table-responsive">
	<table class="table table-light table-hover">
		<thead class="thead-dark">
			<th class="text-center">Item</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Jumlah Item</th>
			<th class="text-center">Total</th>
			<th class="text-center">Tanggal</th>
		</thead>
		<tbody>
			<?php 
				while($resshow = mysqli_fetch_array($qshow)){
					$harga = number_format($resshow['harga'], 0, '', ',');
					$total = number_format($resshow['total'], 0, '', ',');
			?>	
			<input type="hidden" id="no_jual<?= $num ?>" name="no_jual<?= $num ?>" value="<?= $resshow['no_jual'] ?>">
				<tr>
					<td class="text-center"><?= $resshow['item'] ?></td>
					<td class="text-center"><?= $harga ?></td>
					<td class="text-center">
						<input type="button" onclick="minus(<?= $resshow['jumlah_item'] ?>, <?= $resshow['id'] ?>)" value="-" class="btn text-light bg-primary">
						<?= $resshow['jumlah_item'] ?>
						<input type="button" value="+" class="btn text-light bg-primary" onclick="tambah(<?= $resshow['jumlah_item'] ?>, <?= $resshow['id'] ?>)">
					</td>
					<td class="text-center"><?= $total ?></td>
					<td class="text-center"><?= $resshow['tanggal'] ?></td>
				</tr>
			<?php 
					$num += 1;
				}
			 ?>
		</tbody>
	</table>
</div>