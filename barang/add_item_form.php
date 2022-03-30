<?php 
	include('../config.php');
	$action = $_POST['action'];

	if($action == 1){
?>
		<div class="row justify-content-center mt-2">
			<div class="col-md-4">
				<label for="nama">nama</label>
				<input type="text" id="nama" name="nama" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="satuan">satuan</label>
				<select name="satuan" id="satuan" class="form-control">
					<option value="BAN">Ban</option>
					<option value="PCS">Pcs</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="stock">stock</label>
				<input type="number" id="stock" name="stock" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="harga_list">Harga List</label>
				<input type="number" id="harga_list" name="harga_list" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="cashback">Cashback</label>
				<input type="number" id="cashback" name="cashback" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="harga_khusus">Harga Khusus</label>
				<input type="number" id="harga_khusus" name="harga_khusus" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="diskon">Diskon</label>
				<input type="number" id="diskon" name="diskon" class="form-control">
			</div>
			<div class="col-md-12 mt-4">
				<input type="button" name="save" onclick="save()" class="btn btn-success btn-block" id="save" value="Save">
			</div>
		</div>
<?php 
	}else{
		$id = $_POST['id'];

		$sql = "SELECT * FROM tableitem WHERE id=$id";
		$q = mysqli_query($mysqli, $sql);
		$res = mysqli_fetch_array($q);
?>
		<div class="row justify-content-center mt-2">
			<div class="col-md-4">
				<label for="nama">nama</label>
				<input type="text" id="nama" name="nama" class="form-control" value="<?= $res['nama'] ?>">
			</div>
			<div class="col-md-4">
				<label for="satuan">satuan</label>
				<select name="satuan" id="satuan" class="form-control">
					<option value="BAN">Ban</option>
					<option value="PCS">Pcs</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="stock">stock</label>
				<input type="number" id="stock" name="stock" class="form-control" value="<?= $res['stock'] ?>">
			</div>
			<div class="col-md-4">
				<label for="harga_list">Harga List</label>
				<input type="number" id="harga_list" name="harga_list" class="form-control" value="<?= $res['harga_list'] ?>">
			</div>
			<div class="col-md-4">
				<label for="cashback">Cashback</label>
				<input type="number" id="cashback" name="cashback" class="form-control" value="<?= $res['cashback'] ?>">
			</div>
			<div class="col-md-4">
				<label for="harga_khusus">Harga Khusus</label>
				<input type="number" id="harga_khusus" name="harga_khusus" class="form-control" value="<?= $res['harga_khusus'] ?>">
			</div>
			<div class="col-md-4">
				<label for="diskon">Diskon</label>
				<input type="number" id="diskon" name="diskon" class="form-control" value="<?= $res['diskon'] ?>">
			</div>
			<div class="col-md-12 mt-4">
				<input type="button" name="save" onclick="update(<?= $res['id'] ?>)" class="btn btn-success btn-block" id="save" value="Update">
			</div>
		</div>
<?php 
	}