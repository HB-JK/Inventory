<?php 
	include_once 'config.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sumber Roda | Penjualan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">SUMBER RODA</a>
	    </div>

	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="nav navbar-nav">
	        	<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
	        	<li class="nav-item"><a class="nav-link" href="penjualan.php">List Penjualan</a></li>
	        	<li class="nav-item active"><a class="nav-link" href="history.php">History</a></li>
	      	</ul>
	  	</div>
	  </div>
	</nav>


	<div class="container mt-4">
		<h2>History</h2>
		<div class="search mb-3">
			<div class="row bg-dark p-2 rounded form-group">
				<div class="group m-1">
					<input type="text" class="form-control" onkeyup="faktur(this.value)" id="no_faktur" name="no_faktur" placeholder="No Faktur">
				</div>
				<div class="group m-1">
					<input type="text" class="form-control" id="customer" onkeyup="customer(this.value)" name="customer" placeholder="Customer">
				</div>
				<div class="group m-1">
					<input type="text" class="form-control" onkeyup="kendaraan(this.value)" id="no_kendaraan" name="no_kendaraan" placeholder="No Kendaraan">
				</div>

				<div class="group m-1">
					<input type="date" class="form-control" id="tanggal" onchange="tanggal(this.value)" onclick="tanggal(this.value)" onkeyup="tanggal(this.value)" name="tanggal" placeholder="Tanggal">
				</div>

				<div class="group p-1">
					<input type="button" class="btn btn-danger btn-block" value="Reset" name="reset" id="reset">
				</div>


			</div>
		</div>

		<div id="history"></div>
	</div>

	<footer class="mt-5 bg-dark" style="position: absolute; bottom: 0; width: 100%">
		<div class="container">
			<div class="row justify-content-center">
				<h6 class="text-light p-1">copyright 2021</h6>
			</div>
		</div>
	</footer>


<script>
	$(document).ready(function(){
		loadTable(1);
	});

	function kurang(){
		var active = parseInt($('#active').val());
		if(active > 1){
			var sisa = active - 1;
			loadTable(sisa);
		}else{
			loadTable(1);
		}
	}

	function tambah(jumlah){
		var active = parseInt($('#active').val());
		if(active < jumlah){
			var sisa = active + 1;
			loadTable(sisa);
		}else{
			loadTable(jumlah);
		}
	}

	function awal(){
		loadTable(1);
	}

	function akhir(jumlah){
		loadTable(jumlah);
	}

	function loadTable(page){
		$.ajax({
			type: 'POST',
			url: 'history/load_table.php',
			data: {page},
			dataType: 'html',
			success: res => {
				$('#history').html(res);
			}
		});
	}

	function view(no){
		location.href= "history/item_list.php?no_jual="+no;
	}

	$('#reset').click(function(){
		loadTable(1);
		$('#no_faktur').val('');
		$('#customer').val('');
		$('#no_kendaraan').val('');
		$('#tanggal').val('');
	});

	function faktur(search){
		var action = 1;
		$.ajax({
			type: 'POST',
			url: 'history/search.php',
			data: {
				action,
				search
			},
			dataType: 'html',
			success: res => {
				if(search != ''){
					$('#history').html(res);
				}else{
					loadTable(1);
				}
			}
		});
	}

	function customer(search){
		var action = 2;
		$.ajax({
			type: 'POST',
			url: 'history/search.php',
			data: {
				action,
				search
			},
			dataType: 'html',
			success: res => {
				if(search != ''){
					$('#history').html(res);
				}else{
					loadTable(1);
				}
			}
		});
	}

	function kendaraan(search){
		var action = 3;
		$.ajax({
			type: 'POST',
			url: 'history/search.php',
			data: {
				action,
				search
			},
			dataType: 'html',
			success: res => {
				if(search != ''){
					$('#history').html(res);
				}else{
					loadTable(1);
				}
			}
		});
	}

	function tanggal(search){
		var action = 4;
		$.ajax({
			type: 'POST',
			url: 'history/search.php',
			data: {
				action,
				search
			},
			dataType: 'html',
			success: res => {
				if(search != ''){
					$('#history').html(res);
				}else{
					loadTable(1);
				}
			}
		});
	}

	function viewsj(faktur){
		location.href = "history/sj.php?no_faktur="+faktur;
	}
</script>
</body>
</html>