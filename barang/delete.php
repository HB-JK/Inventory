<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$id = $_POST['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM tableitem WHERE id=$id");


if($result){
	echo json_encode([
		'message' => 'Item Berhasil Dihapus'
	]);
}else{
	echo json_encode([
		'message' => 'Item gagal dihapus'
	]);
}