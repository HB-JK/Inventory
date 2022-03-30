<?php 
	include_once('../config.php');
	date_default_timezone_set("Asia/Bangkok");

	$item = $_POST['item'];
	$jumlah = $_POST['jumlah_item'];
	$harga = $_POST['harga'];
	$total = $_POST['total'];
	$satuan = $_POST['satuan'];
	$tanggal = date('Y-m-d');

	if($jumlah < 1){
		echo "jumlah item masih 0";
		return;
	}

	$sqlhistory = "SELECT * FROM tbhistory";
	$qhistory = mysqli_query($mysqli, $sqlhistory);
	$no_jual = mysqli_num_rows($qhistory) + 1;

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
		$sql = "INSERT INTO tbpenjualan(no_jual, item, satuan, harga, jumlah_item, total, tanggal) VALUES($no_jual, '$item', '$satuan', $harga, $jumlah, $total, '$tanggal')";
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

		
