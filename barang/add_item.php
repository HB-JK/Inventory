<?php 
	include '../config.php';

	if($_POST['action'] == 1){
		$nama = strtoupper($_POST['nama']);
		$satuan = $_POST['satuan'];
		$stock = $_POST['stock'];
		$harga_list = $_POST['harga_list'];
		$cashback = $_POST['cashback'];
		$harga_khusus = $_POST['harga_khusus'];
		$diskon = $_POST['diskon'];

		$sql = "INSERT INTO tableitem(nama, satuan, stock, harga_list, cashback, harga_khusus, diskon) VALUES('$nama', '$satuan', $stock, $harga_list, $cashback, $harga_khusus, $diskon)";
		$q = mysqli_query($mysqli, $sql);

		if($q){
			echo json_encode([
				'message' => 'berhasil'
			]);
		}else{
			echo json_encode([
				'message' => 'Ada data yang salah format'
			]);
		}
	}else{
		$id = $_POST['id'];
		$nama = strtoupper($_POST['nama']);
		$satuan = $_POST['satuan'];
		$stock = $_POST['stock'];
		$harga_list = $_POST['harga_list'];
		$cashback = $_POST['cashback'];
		$harga_khusus = $_POST['harga_khusus'];
		$diskon = $_POST['diskon'];

		$sql = "UPDATE tableitem SET nama='$nama', satuan='$satuan', stock=$stock, harga_list=$harga_list, cashback=$cashback, harga_khusus=$harga_khusus, diskon='$diskon' WHERE id=$id";
		$q = mysqli_query($mysqli, $sql) or die($sql);

		if($q){
			echo json_encode([
				'message' => 'berhasil'
			]);
		}else{
			echo json_encode([
				'message' => 'Ada data yang salah format'
			]);
		}
	}
 ?>