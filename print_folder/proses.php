<?php 
	date_default_timezone_set('Asia/Bangkok');
	require '../config.php';

	$no_jual = $_POST['no_jual'];
	$grandtotal = $_POST['grandtotal'];
	$customer = $_POST['customer'];
	$no_kendaraan = $_POST['no_kendaraan'];
	$no_faktur = $_POST['no_faktur'];
	$pembayaran = $_POST['pembayaran'];

	$tanggal = date('Y-m-d');

	$sqlhistory = "INSERT INTO tbhistory(no_faktur, no_jual, customer, no_kendaraan, pembayaran, grandtotal, tanggal) VALUES('$no_faktur', $no_jual, '$customer', '$no_kendaraan', '$pembayaran', $grandtotal, '$tanggal')";
	$qhistory = mysqli_query($mysqli, $sqlhistory);

	$sqlitem = "SELECT * FROM tbpenjualan WHERE no_jual=$no_jual";
	$qitem = mysqli_query($mysqli, $sqlitem);
	while($resitem = mysqli_fetch_array($qitem)){
		$kode_barang = $resitem['kode_barang'];
		$item = $resitem['item'];
		$satuan = $resitem['satuan'];
		$harga = $resitem['harga'];
		$jlh = $resitem['jumlah_item'];
		$total = $resitem['total'];

		if($kode_barang >= 1){
			$sqlhistoryitem = "INSERT INTO tbhistoryitem(no_jual, kode_barang, item, satuan, harga, jumlah_item, total, tanggal) VALUES($no_jual, $kode_barang, '$item', '$satuan', $harga, $jlh, $total, '$tanggal')";
			$qhistoryitem = mysqli_query($mysqli, $sqlhistoryitem);

			$sqlstock = "SELECT stock FROM tableitem WHERE id=$kode_barang";
			$qstock = mysqli_query($mysqli, $sqlstock);

			$resstock = mysqli_fetch_array($qstock);
			$stock = $resstock['stock'];
			$sisa = $stock - $jlh;

			$sqlupdate = "UPDATE tableitem SET stock=$sisa WHERE id=$kode_barang";
			$qupdate = mysqli_query($mysqli, $sqlupdate);
		}else{
			$sqlhistoryitem = "INSERT INTO tbhistoryitem(no_jual, item, satuan, harga, jumlah_item, total, tanggal) VALUES($no_jual, '$item', '$satuan', $harga, $jlh, $total, '$tanggal')";
			$qhistoryitem = mysqli_query($mysqli, $sqlhistoryitem);
		}
	}

	$sqldelete = "DELETE FROM tbpenjualan WHERE no_jual=$no_jual";
	$qdelete = mysqli_query($mysqli, $sqldelete);

	echo json_encode([
		'message' => 'selesai'
	]);

 ?>