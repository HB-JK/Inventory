<?php 
	date_default_timezone_set('Asia/Bangkok');
	require 'print_folder/no_faktur.php';
	include_once('config.php');

	$no = $_GET['no_jual'];
	$date = date('d/m/Y');

	$sql = "SELECT * FROM tbhistory ORDER BY created_at DESC LIMIT 1";
	$q = mysqli_query($mysqli, $sql);

	$res = mysqli_fetch_array($q);
	$num = mysqli_num_rows($q);
	$faktur = '';
	if($num > 0){
		$faktur = $res['no_faktur'];
	}


	$tgl = intval(date('d'));

	$no_faktur = faktur($faktur);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sumber Roda | Print Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<style>
	.back{
		position: fixed;
		top: 2%;
		left: 2%;
	}
	
	.back a{
		font-weight: bold;
		font-size: 20px;
	}

	.group{
		margin-right: 5px;
	}

	@media print{
		body *{
			visibility: hidden;
		}

		.faktur, .faktur *{
			visibility: visible;
		}

		.faktur{
			position: absolute;
			top: 0;
			left: 0;
		}

		.faktur #line, .faktur #line2, .faktur #line3{
			font-size: 14px;
		}

		.faktur .faktur_body, .faktur .faktur_body2{
			margin-left: 1.55%;
		}
	}

	#line{
		line-height: 1;
	}

	#line2{
		line-height: 0.1;
	}

	.print_form{
		display: flex;
		justify-content: flex-end;
		margin-right: 13%;
	}

	.faktur_body{
		height: 230px;
		margin-left: 1.4%;
	}

	.faktur_body2{
		margin-left: 1.4%;
	}

	.text{
		display: flex;
		justify-content: flex-start;
	}

	td{
		text-align: center;
	}

	.right{
		text-align: right;
	}

	.ttd{
		display: flex;
		justify-content: center;
	}
</style>
<body>
	<div class="back">
		<a href="penjualan.php" class="btn btn-danger">Back</a>
	</div>

	<div class="container mt-5">
		<h4 class="mb-3">Faktur Penjualan</h4>
		<div class="data ml-2 mb-5 mr-2">
			<div class="form-group row">
				<div class="group">
					<label for="customern">Customer</label>
					<input type="text" id="customern" name="customern" class="form-control">
				</div>

				<div class="group">
					<label for="n_kendaraan">No kendaraan</label>
					<input type="text" id="n_kendaraan" name="n_kendaraan" class="form-control">
				</div>

				<div class="group">
					<label for="pembayaran">Pembayaran</label>
					<select name="pembayaran" id="pembayaran" onchange="loadTable()" class="form-control">
						<option value="transfer">Transfer</option>
						<option value="bca">BCA</option>
						<option value="edc">EDC</option>
						<option value="cash">Cash</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="group">
					<label for="item">Item</label>
					<input type="text" id="item" name="item" class="form-control">
				</div>

				<div class="group">
					<label for="satuan">Satuan</label>
					<select name="satuan" id="satuan" class="form-control">
						<option value="BAN">BAN</option>
						<option value="PCS">PCS</option>
					</select>
				</div>

				<div class="group">
					<label for="harga">harga</label>
					<input type="number" id="harga" name="harga" onkeyup="hitung()" onclick="hitung()" class="form-control">
				</div>

				<div class="group">
					<label for="jumlah_item">Jumlah Item</label>
					<input type="number" id="jumlah_item" name="jumlah_item" onkeyup="hitung()" onclick="hitung()" class="form-control">
				</div>

				<div class="group">
					<label for="total">Total</label>
					<input type="number" id="total" name="total" class="form-control" readonly="yes">
				</div>

				<div class="group">
					<input type="text" style="border: none">
					<button class="btn btn-success btn-block" id="save">Tambah</button>
				</div>
			</div>

		</div>
	</div>

	<div class="container faktur" id="faktur">
		<div class="faktur_head row">
			<div class="col-md-4">
				<h4 style="font-weight: normal"><u>SUMBER RODA</u></h4>
				<h6 style="font-weight: normal">Menjual: Ban, Velg & Press Velg</h6>
				<h6 style="font-weight: normal">JL. KHW Hasyim No.60 Pontianak</h6>
				<h6 style="font-weight: normal">HP: 0821 4856 4224</h6>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-5" class="" style="float:right">
				<h6 style="font-weight: normal; text-align: right" class="output row mb-2 mt-1 ml-0 mr-0">
					<div class="col-md-3"></div>
					<div class="col-md-5 pr-0" class="text">Tanggal:</div>
					<div class="col-md-4 p-0 m-0" class="text" id="tanggal"><?= $date ?></div>
				</h6>

				<h6 style="font-weight: normal; text-align: right" class="output row mb-2 mt-1 ml-0 mr-0">
					<div class="col-md-3"></div>
					<div class="col-md-5 pr-0" class="text">Customer:</div>
					<div class="col-md-4 p-0 m-0" class="text" id="customer_name"></div>
				</h6>

				<h6 style="font-weight: normal; text-align: right" class="output row mb-2 mt-1 ml-0 mr-0">
					<div class="col-md-3"></div>
					<div class="col-md-5 pr-0" class="text">No. Kendaraan:</div>
					<div class="col-md-4 p-0 m-0" class="text" id="kendaraan"></div>
				</h6>
			</div>
		</div>

		<div class="no_faktur mt-2">
			<h6 class="mb-0" style="font-weight: normal;">No.Faktur: <?= $no_faktur ?></h6>
		</div>

		<div class="faktur_body mt-0" style="width: 100%">
			<table class="table table-borderless" style="width: 100%">
				<tr class="row"><td class="m-0 p-0"><div id="line"></div></td></tr>
				<tr class="row">
					<td class="m-0 p-0" style="flex: 0 0 3%; max-width: 3%">No.</td>
		 			<td class="col-md-5 m-0 p-0" colspan="6">Nama Barang/Produk</td>
		 			<td class="col-md-1 m-0 p-0" colspan="6">Qty.</td>
		 			<td class="col-md-1 m-0 p-0" colspan="6">Satuan</td>
		 			<td class="col-md-2 m-0 p-0">Harga</td>
		 			<td class="col-md-2 m-0 p-0 right">Jumlah</td>
				</tr>
				<tr class="row"><td class="m-0 p-0"><div id="line2"></div></td></tr>
			</table>
			<div id="item-list"></div>
		</div>

		<div class="faktur_body2">
			<table class="table table-borderless" style="width: 100%">
				<tr class="row"><td class="m-0 p-0"><div id="line3"></div></td></tr>

				<tr class="row">
					<td class="m-0 p-0" style="flex: 0 0 3%; max-width: 3%"></td>
		 			<td class="col-md-5 m-0 p-0" colspan="6"></td>
		 			<td class="col-md-1 m-0 p-0" colspan="6"></td>
		 			<td class="col-md-1 m-0 p-0" colspan="6"></td>
		 			<td class="col-md-2 m-0 p-0">Total:</td>
		 			<td class="col-md-2 m-0 p-0 right"><div id="gtotal"></div></td>
				</tr>
			</table>

			<div class="ttd mb-4 p-5">
				<div class="col-md-2">
					Tanda Terima
				</div>
				<div class="col-md-7"></div>
				<div class="col-md-2">
					Hormat Kami
				</div>
			</div>

			<div class="footer ">
				<p>**Terima kasih telah berbelanja di SUMBER RODA Pontianak**</p>
			</div>

		</div>

	</div>

	<div class="container mt-5 mb-5 print_form">
		<input type="hidden" id="no_jual" value="<?= $no; ?>">
		<input type="hidden" id="grandtotal">
		<input type="hidden" id="customer">
		<input type="hidden" id="no_kendaraan">
		<input type="hidden" id="no_faktur" value="<?= $no_faktur ?>">

		<button class="btn btn-success mr-2" id="proses">Save</button>
		<button class="btn btn-primary" onclick="window.print()" id="print">Print</button>

	</div>

<script>

	$(document).ready(function(){
		loadTable();

		$('#customern').keyup(function(){
			$('#customer_name').text(this.value);
			$('#customer').val(this.value);
		});

		$('#n_kendaraan').keyup(function(){
			$('#kendaraan').text(this.value);
			$('#no_kendaraan').val(this.value);
		});

		garis(320, document.getElementById('line'));
		garis(320, document.getElementById('line2'));
		garis(320, document.getElementById('line3'));
	});

	function hitung(){
		var jumlah = $('#jumlah_item').val();
		var harga_jual = $('#harga').val();

		var harga_akhir = jumlah * harga_jual;

		document.getElementById('total').value = harga_akhir.toFixed();
	}

	function loadTable(){
		var pembayaran = $('#pembayaran').val();
		$.ajax({
			type:'POST',
			url: 'print_folder/load_table.php',
			data: {
				pembayaran
			},
			dataType: 'html',
			success: res => {
				var data = res.split('#');
				$('#item-list').html(data[0]);
				$('#grandtotal').val(data[1]);
				$('#gtotal').html(data[2]);
			}
		});
	}

	$('#save').click(function(e){
		e.preventDefault();
		var item = $('#item').val();
		var harga = $('#harga').val();
		var jumlah_item = $('#jumlah_item').val();
		var total = $('#total').val();
		var satuan = $('#satuan').val();
		$.ajax({
			type: 'POST',
			url: 'print_folder/additem.php',
			data: {
				item,
				harga,
				jumlah_item,
				total,
				satuan
			},
			dataType: 'JSON',
			success: function(res){
				alert(res.message);
				$('#item').val('');
				$('#harga').val('');
				$('#jumlah_item').val('');
				$('#total').val('0');
				loadTable();
			}
		});
	});

	function garis(width, part){
		for(var i = 0; i < width; i++){
			part.innerHTML += '.';
		}
	}

	$('#proses').click(function(e){
		var no_jual = $('#no_jual').val();
		var grandtotal = $('#grandtotal').val();
		var customer = $('#customer').val();
		var no_kendaraan = $('#no_kendaraan').val();
		var no_faktur = $('#no_faktur').val();
		var pembayaran = $('#pembayaran').val();
		$.ajax({
			type: 'POST',
			url: 'print_folder/proses.php',
			data: {
				no_jual,
				grandtotal,
				customer,
				no_kendaraan,
				no_faktur,
				pembayaran
			},
			dataType: 'JSON',
			success: function(res){
				alert(res.message);
			}
		});
	});
		
</script>

</body>
</html>