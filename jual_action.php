<?php
	include_once('config.php');
	date_default_timezone_set("Asia/Bangkok");

	$action = $_POST['action'];

	if($action == 'save'){
		$nama = $_POST['nama'];
		$id = $_POST['id'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga_jual'];
		$total = $_POST['harga_total'];
		$tanggal = date('Y-m-d');

		if($jumlah < 1){
			echo json_encode([
				'message' => 'Jumlah Item Masih 0'
			]);
			return;
		}

		$sqlhistory = "SELECT * FROM tbhistory";
		$qhistory = mysqli_query($mysqli, $sqlhistory);
		$no_jual = mysqli_num_rows($qhistory) + 1;

		$sqlitem = "SELECT * FROM tableitem WHERE id=$id";
		$qitem = mysqli_query($mysqli, $sqlitem);
		$resitem = mysqli_fetch_array($qitem);

		$item = $nama;
		$satuan = $resitem['satuan'];

		$sqlcheck = "SELECT * FROM tbpenjualan WHERE item='$item'";
		$qcheck = mysqli_query($mysqli, $sqlcheck);
		$numcheck = mysqli_num_rows($qcheck);

		if($numcheck > 0){
			
			$sql = "SELECT * FROM tbpenjualan WHERE item='$item'";
			$q = mysqli_query($mysqli, $sql);
			$res = mysqli_fetch_array($q);
			$jlh = $res['jumlah_item'];
			$ttl = $res['total'];

			$jlh += $jumlah;
			$ttl += $total;

			$sqlupdate = "UPDATE tbpenjualan SET jumlah_item=$jlh, total=$ttl WHERE item='$item'";
			$qupdate = mysqli_query($mysqli, $sqlupdate);

			if($qupdate){
				echo json_encode([
					'message' => 'berhasil'
				]);
			}else{
				echo json_encode([
					'message' => 'gagal'
				]);
			}
		}else{
			$sql = "INSERT INTO tbpenjualan(no_jual, kode_barang, item, satuan, harga, jumlah_item, total, tanggal) VALUES($no_jual, $id, '$item', '$satuan', $harga, $jumlah, $total, '$tanggal')";
			$q = mysqli_query($mysqli, $sql) or die($sql);

			if($q){
				echo json_encode([
					'message' => 'berhasil'
				]);
			}else{
				echo json_encode([
					'message' => 'gagal'
				]);
			}
		}
	}elseif($action == 'update'){
		$jumlah = $_POST['jumlah'];
		$id = $_POST['id'];
		$cashback = $_POST['cashback'];

		if($jumlah < 1){
			$sql = "DELETE FROM tbpenjualan WHERE id=$id";
			$q = mysqli_query($mysqli, $sql);

			echo json_encode([
				'message' => 'Item Berhasil Dihapus'
			]);

			return;
		}

		$sqlshow = "SELECT * FROM tbpenjualan WHERE id=$id";
		$qshow = mysqli_query($mysqli, $sqlshow);
		$resshow = mysqli_fetch_array($qshow);
		$harga = $resshow['harga'];

		$total = $jumlah * $harga;

		$sqlupdate = "UPDATE tbpenjualan SET jumlah_item=$jumlah, total=$total WHERE id=$id";
		$qupdate = mysqli_query($mysqli, $sqlupdate);

		echo json_encode([
			'message' => 'berhasil'
		]);
	}