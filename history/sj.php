<?php 
	require '../config.php';
	$no_faktur = $_GET['no_faktur'];
	$sql = "SELECT * FROM tbhistory WHERE no_faktur='$no_faktur'";
	$q = mysqli_query($mysqli, $sql);
	$res = mysqli_fetch_array($q);
	$customer = $res['customer'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SURAT JALAN</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.6.0.min.js"></script>
</head>
<style>
	.back{
		position: fixed;
		left: 2%;
		top: 2%;
	}
</style>
<body>
	<div class="back">
		<a href="../history.php" class="btn btn-danger">Back</a>
	</div>

	<div class="container mt-5">

		<div class="surat_jalan">
			<div class="header row">
				<div class="col-md-4">
					<h4 style="font-weight: normal"><u>SUMBER RODA</u></h4>
					<h6 style="font-weight: normal">Menjual: Ban, Velg & Press Velg</h6>
					<h6 style="font-weight: normal">JL. KHW Hasyim No.60 Pontianak</h6>
					<h6 style="font-weight: normal">HP: 0821 4856 4224</h6>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-5" class="" style="float:right">
					<input type="text" style="visibility: hidden">

					<h6 style="font-weight: normal; text-align: right" class="output row mb-2 mt-1 ml-0 mr-0">
						<div class="col-md-3"></div>
						<div class="col-md-4 pr-0" class="text">Kepada YTH:</div>
						<div class="col-md-4 m-0" style="text-align: left" class="text" id="tanggal"> <?= $customer ?></div>
					</h6>

				</div>
			</div>
		</div>

	</div>
</body>
</html>