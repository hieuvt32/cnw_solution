<?php
	$id_sp = $_GET['id_sp'];
	include('lib_db.php');
	$sql = "DELETE FROM sanpham WHERE id_sp = $id_sp";
	$query = exec_update($sql);
	echo $query;
	header('location:admin.php?page_layout=product');

?>