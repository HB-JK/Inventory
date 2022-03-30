<?php 
	include_once('config.php');

	$id = $_GET['id'];

	$sql = "SELECT stock, harga_list, cashback FROM tableitem WHERE id='$id'";
	$q = mysqli_query($mysqli, $sql);
	$res = mysqli_fetch_array($q);

	echo $res['stock'];
	echo '#';
	echo $res['harga_list'];
	echo '#';
	echo $res['cashback'];
 ?>