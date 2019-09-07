<h1>Beranda</h1>
<?php
	if(isset($_SESSION['SES_MAN'])) {?>
	
	<div class="hero-unit"><legend>ADMINISTRATOR </legend>
	<p> Selamat datang di Sistem Informasi Penilaian Barang Milik Daerah (SILAMBDA) KOTA BANJARBARU, silakan gunakan menu navigasi untuk mencari/merubah informasi lebih lanjut. Anda telah login sebagai Administrator.</p>
	
	
	<?php }
	else if (isset($_SESSION['SES_TU'])) {?>
	<div class="hero-unit">
	
	<legend>SALES </legend>
	<p> Selamat datang di Sistem Informasi Penilaian Barang Milik Daerah (SILAMBDA) KOTA BANJARBARU, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda telah login sebagai Sales.</p>
	<?php }
	else if (isset($_SESSION['SES_PRO'])) {?>
	<div class="hero-unit">
	<legend>MANAJER </legend>
	<p> Selamat datang di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda telah login sebagai Manager.</p>
	<?php }
	else  {?>
	<div class="hero-unit">
	<legend>USER </legend>
	<p> Selamat datang di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda juga bisa menggunakan login untuk memproses lebih lanjut informasi ataupun melakukan perubahan data dalam Sistem Informasi ini</p>
	<?php }?>
</div>
			
			
			<?php

include_once "mast/subjek_config.php"; 
$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis ORDER BY $tableName.updated_at DESC LIMIT 4"; 
  
 
	$data[1]	= isset($_POST['txt1']) ? $_POST['txt1'] : ''; 
	$data[2]	= isset($_POST['txt2']) ? $_POST['txt2'] : ''; 
	$data[3]	= isset($_POST['txt3']) ? $_POST['txt3'] : ''; 
	$data[4]	= isset($_POST['txt4']) ? $_POST['txt4'] : ''; 
	$data[5]	= isset($_POST['txt5']) ? $_POST['txt5'] : ''; 
	$data[6]	= isset($_POST['txt6']) ? $_POST['txt6'] : ''; 
	$data[7]	= isset($_POST['txt7']) ? $_POST['txt7'] : ''; 
	$data[8]	= isset($_POST['txt8']) ? $_POST['txt8'] : ''; 
	$data[9]	= isset($_POST['txt9']) ? $_POST['txt9'] : 'Banjarbaru'; 
	$data[10]	= isset($_POST['txt10']) ? $_POST['txt10'] : ''; 
	$data[11]	= isset($_POST['txt11']) ? $_POST['txt11'] : ''; 
	$data[12]	= isset($_POST['txt12']) ? $_POST['txt12'] : ''; 
	$data[13]	= isset($_POST['txt13']) ? $_POST['txt13'] : ''; 
	
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error paging1: ".mysqli_error($koneksidb)); 
$jml	 = mysqli_num_rows($pageQry); 
$max	 = ceil($jml/$row); 
?>  
	<form id="edit-profile" class="form-horizontal">
	<?php
while ($kolomData = mysqli_fetch_array($pageQry)) {
?>						<div class="box card row-fluid span3">
		<fieldset>
			<legend><?php echo $kolomData[$field[5]];?></legend>
			  
 <div class="container">
			 
				<img src="images/foto/<?php echo $kolomData[$field[13]] ? $kolomData[$field[13]] :"no-image.png";?>"> 
			 
			 
 
		<div class="overlay">
			
		<table class="table "> 
			<tr>
				<td><?php echo $isian[5];?></td> 
					<td><?php echo $kolomData[$field[5]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[6];?></td> 
					<td><?php echo $kolomData[$field[6]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[7];?></td> 
					<td><?php echo $kolomData[$field[7]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[8];?></td> 
					<td><?php echo $kolomData[$field[8]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[9];?></td> 
					<td><?php echo $kolomData[$field[9]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[10];?>, <?php echo $isian[11];?></td> 
					<td><?php echo $kolomData[$field[10]];?>,<?php echo $kolomData[$field[11]];?></td> 
			</tr> 
			 
			<tr>
				<td><?php echo $isian[12];?></td> 
					<td><?php echo $kolomData[$field[12]];?></td> 
				</tr> 
		</table>
</div>
			 
			 
		</fieldset>
		
		</div>
					
<?php } ?>	
</form>  