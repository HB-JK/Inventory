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
	        <li class="nav-item active"><a class="nav-link" href="penjualan.php">List Penjualan</a></li>
	        <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
	      </ul>
	  </div>

	  </div>
	</nav>

	<h2 class="p-2 mt-5">Penjualan</h2>

	<div class="row m-auto">
		<div class="col-md-4 p-2">
			<form method="POST" action="jual_action.php" id="sell-form">
				<div class="form-group row m-auto p-1">
					<label class="col-md-3 m-auto" for="roda" >Roda</label>
					<input type="text" list="rodalist" id="roda" onchange="sisaStock()" class="col-md-8 form-control" placeholder="pilih item...">
					<datalist name="rodalist" id="rodalist">
						<?php 
							$sql = "SELECT * FROM tableitem";
							$q = mysqli_query($mysqli, $sql);
							while($res = mysqli_fetch_array($q)){
						?>
						<option data-value="<?= $res['id'] ?>" value="<?= $res['nama'] ?>"></option>
						<?php 
							}
						 ?>
					</datalist>
				</div>

				<input type="hidden" id="cashback" name="cashback">

				<div class="form-group row m-auto p-1">
					<label for="stock" class="col-md-3 m-auto">Sisa Stock</label>
					<input type="text" class=" col-md-8 form-control" name="stock" id="stock" disabled="yes">
				</div>

				<div class="form-group row m-auto p-1">
					<label for="jumlah" class="col-md-3 m-auto">Jlh Item</label>
					<input type="number" onkeyup="hitung()" class=" col-md-8 form-control" name="jumlah" id="jumlah" value="0">
					<div class="col-md-3 m-auto"></div>
					<span class="error-text text-danger fs-1 col-md-8 m-auto" id="error"></span>
				</div>

				<div class="form-group row m-auto p-1">
					<label for="harga_jual" class="col-md-3 m-auto">Harga Jual</label>
					<input type="number" onkeyup="hitung()" class=" col-md-8 form-control" name="harga_jual" id="harga_jual">
				</div>

				<div class="form-group row m-auto p-1">
					<label for="harga_total" class="col-md-3 m-auto">Harga Total</label>
					<input type="number" class=" col-md-8 form-control" name="harga_total" id="harga_total" readonly>
				</div>

				<div class="form-group">
					<input type="submit" id="insert" class="btn btn-block btn-success m-auto" value="save">
				</div>

			</form>

		</div>
		<div class="col-md-8 p-2">
			<div class="row col-md-12 ml-1">
				<div class="col-md-9"></div>
				<div class="col-md-3">
					<button style="float:right" onclick="printPage()" class="btn btn-success mb-2"><strong>Process page >></strong></button>
				</div>
			</div>
			<div id="penjualan"></div>
		</div>
	</div>

<script>
	$(document).ready(function(){
		loadTable();
	});

	function loadTable(){
		$.ajax({
			type: 'POST',
			url: 'load_action.php',
			data: '',
			dataType: 'html',
			success: res => {
				$('#penjualan').html(res);
			},
		});
	}

	function sisaStock(){
		var xhr;
		var roda = $('#roda').val();
		var id = $("#rodalist option[value='"+roda+"']").data('value');
		var stock = document.getElementById('stock');
		var harga_jual = document.getElementById('harga_jual');
		var cashback = document.getElementById('cashback');
		var url = "getStock.php?id="+id;

		xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(this.status == 200 && this.readyState == 4){
				var data = this.responseText;
				data = data.split('#');
				stock.value = data[0];
				harga_jual.value = data[1];
				cashback.value = data[2];

				if(stock.value < 1){
					document.getElementById('jumlah').disabled = true;
					document.getElementById('error').innerText = 'Sedang tidak ada stock';
				}else{
					document.getElementById('jumlah').disabled = false;
					document.getElementById('error').innerText = '';
				}
				hitung();
			}
		}
		xhr.open('GET', url, true);
		xhr.send();
	}

	function hitung(){
		var jumlah = $('#jumlah').val();
		var harga_jual = $('#harga_jual').val();
		var cashback = $('#cashback').val();

		var harga_akhir = jumlah * harga_jual;
		
		document.getElementById('harga_total').value = harga_akhir.toFixed();
	}

	$('#insert').click(function(e){
		e.preventDefault();
		var nama = $('#roda').val();
		var id = $("#rodalist option[value='"+nama+"']").data('value');
		var jumlah = $('#jumlah').val();
		var harga_jual = $('#harga_jual').val();
		var harga_total = $('#harga_total').val();
		$.ajax({
			method: 'POST',
			url: 'jual_action.php',
			data: {
				action: 'save',
				id,
				nama,
				jumlah,
				harga_jual,
				harga_total
			},
			dataType: 'JSON',
			success: function(res){
				alert(res.message);
				loadTable();
				$('#jumlah').val('0');
				$('#harga_total').val('0');
			}
		});
	});

	function printPage(){
		var no_jual = $('#no_jual1').val();

		location.href="print_page.php?no_jual="+no_jual;
	}

	function minus(jumlah, id){
		jumlah -= 1;
		var cashback = $('#cashback').val();
		$.ajax({
			type: 'POST',
			url: 'jual_action.php',
			data: {
				action: 'update',
				jumlah,
				id,
				cashback
			},
			dataType: 'JSON',
			success:function(res){
				if(res.message == 'Item Berhasil Dihapus'){
					alert(res.message);
				}else{
					console.log(res.message);
				}
				loadTable();
			}
		});
	}

	function tambah(jumlah, id){
		jumlah += 1;
		var cashback = $('#cashback').val();
		$.ajax({
			type: 'POST',
			url: 'jual_action.php',
			data: {
				action: 'update',
				jumlah,
				id,
				cashback
			},
			dataType: 'JSON',
			success:function(res){
				if(res.message == 'Item Berhasil Dihapus'){
					alert(res.message);
				}else{
					console.log(res.message);
				}
				loadTable();
				$('#jumlah').val('0');
				$('#harga_total').val('0');
			}
		});
	}

	// function romanize(val){
	// 	val = parseInt(val);

	// 	var lookup = {
	// 			CM:900,
	// 			D:500,
	// 			CD:400,
	// 			C:100,
	// 			XC:90,
	// 			L:50,
	// 			XL:40,
	// 			X:10,
	// 			IX:9,
	// 			V:5,
	// 			IV:4,
	// 			I:1,
	// 		};

	// 	var roman = '', i;

	// 	for(i in lookup){
	// 		if(val >= lookup[i]){
	// 			val -= lookup[i];
	// 			roman += i;
	// 		}
	// 	}

	// 	return roman;
	// }

</script>

</body>
</html>