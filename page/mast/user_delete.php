<?php
include_once "lib/seslogin.php";
include_once "user_lib.php";

if($_GET) {
	if(empty($_GET['Kode'])){
		echo "<b>Data yang dihapus tidak ada</b>";
	}
	else {
		$mySql = "DELETE FROM ".$tableName." WHERE ".$field0."='".$_GET['Kode']."'";
		$myQry = mysqli_query($koneksidb,$mySql) or die ("Eror hapus data".mysqli_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>";
		}
	}
}
?>