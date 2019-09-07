<?php

include_once "lib/seslogin.php"; 
include_once "mast/subjek_config.php"; 
$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis ORDER BY $tableName.updated_at DESC"; 
 
if(isset($_POST['qcari'])){ 
  $qcari=$_POST['qcari']; 
  $pageSql="SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis WHERE  (".$tableName.".".$field[5]." like '%$qcari%') ORDER BY ".$tableName.".".$field[2]." DESC "; 
} 
 
if(isset($_POST['btnSave'])){  
	$txt[1] = ''; 
	$txt[2] = ''; 
	$txt[3] = '0'; 
	$txt[4] = $_POST['txt4']; 
	$txt[5] = $_POST['txt5']; 
	$txt[6] = $_POST['txt6']; 
	$txt[7] = $_POST['txt7']; 
	$txt[8] = $_POST['txt8']; 
	$txt[9] = $_POST['txt9']; 
	$txt[10] = $_POST['txt10']; 
	$txt[11] = $_POST['txt11']; 
	$txt[12] = $_POST['txt12']; 
	$txt[13] = $_FILES['txt13']; 
	$nama_gambar = str_replace(" ","-",strtolower($_POST['txt5']));
	$txt[13] = $nama_gambar.".jpg";
	$txt13 = $_FILES['txt13'];

	$pesanError = array(); 
	for($i=4;$i<=$jmlField;$i++){ 
		if (trim($txt[$i])=="") { 
			$pesanError[] = "Data <b>".$isian[$i]."</b> tidak boleh kosong !"; 
		} 
	} 

	$ada = cekAda($koneksidb,$tableName,$field[5],$isian[5],$txt[5]); 
	if($ada)        {  
		$pesanError[] = "Maaf, ".$isian[5]." <b> ".$txt[5]." </b> Sudah Ada.";	 
	} 

	if (count($pesanError)>=1 ){  
		echo "<div class='mssgBox'>";  
		$noPesan=0; 
		foreach ($pesanError as $indeks=>$pesan_tampil) {  
			$noPesan++;  
			echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a> 
			<h4 class="alert-heading">Error!</h4>'.$noPesan.'. '.$pesan_tampil.'</div><br>';	 
		}  
		echo "</div> <br>";  
	} 
	else { 
		$mySql	= "INSERT INTO ".$tableName." ".getInsert2($jmlField,$field,$txt); 
		$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query insert :".getInsert2($jmlField,$field,$txt)." DB ".mysqli_error($koneksidb)); 
		if($myQry){ 
		uploadGambarFoto('txt13','images/foto/',$nama_gambar,'jpg');
			echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."'>"; 
		} 
		exit; 
	} 

} 

 
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

<table class="table table-striped blue"> 
	<tr> 
	  <td colspan="2"><h1><b>Data <?php echo $formName;?></b>  
	  <form class="navbar-search pull-right"  method="POST" action="?page=<?php echo $formName?>">  
		  <input type="text" name="qcari" placeholder="Cari..." autofocus/> 
	  </form></h1> </td> 
	</tr> 
</table> 
<div class="accordion" id="collapse-group">         
  <div class="accordion-group widget-box"> 
	  <div class="accordion-heading"> 
		  <div class="widget-title"> 
			  <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse"> 
				  <span class="icon"><i class="icon-circle-arrow-right"></i></span><h5>Tambah Data <?php  echo $formName ?></h5> 
			  </a> 
		  </div> 
	  </div> 
	  <div class="collapse accordion-body" id="collapseGTwo"> 
		  <div class="widget-content">      
			  <form id="new-project" class="form-horizontal " action="?page=<?php echo $formName;?>" method="post" name="form1" target="_self" enctype="multipart/form-data" > 
				  <fieldset> 
					<table class="table table-striped"> 
						<tr> 
							<td width="24%"><b><?php echo $isian[4]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%">
							<select name="txt4" class="input-xxlarge"> 
							<?php
							$mySql2 = "SELECT * FROM jenis_subjek";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query SKPD  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[4] == $kolomData1['id']) {
									$cek = "selected";
								} else { $cek=""; }
								
								echo "<option value='$kolomData1[id]' $cek>$kolomData1[nama]</option>";
							}
							$mySql ="";
							?>
							</select><!--
							<input name="txt4" type="text" class="input-xxlarge" value="<?php echo $data[4]; ?>" size="60" maxlength="60"  />--></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[5]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt5" type="text" class="input-xxlarge" value="<?php echo $data[5]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[6]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt6" type="text" class="input-xxlarge" value="<?php echo $data[6]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[7]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt7" type="text" class="input-xxlarge" value="<?php echo $data[7]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[8]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt8" type="text" class="input-xxlarge" value="<?php echo $data[8]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[9]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt9" type="text" class="input-xxlarge" value="<?php echo $data[9]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[10]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt10" type="text" class="input-xxlarge" value="<?php echo $data[10]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[11]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt11" type="text" class="input-xxlarge" value="<?php echo $data[11]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[12]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt12" type="text" class="input-xxlarge" value="<?php echo $data[12]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[13]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt13" type="file" class="input-xxlarge" value="" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							 <td>&nbsp;</td> 
							 <td>&nbsp;</td> 
							 <td><button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button> 
								<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('Reset data yang telah anda ketik?')"/>Reset</button> 
							  	<a class="toggle-link" href="#new-project"><button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " /><!-- onclick="history.back();" --> Batal </button></a> 
							 </td> 
						</tr> 
					 </table> 
				 </fieldset> 
			 </form> 
		 </div> 
	 </div> 
  </div> 
</div>	 
	<form id="edit-profile" class="form-horizontal">
	<?php
while ($kolomData = mysqli_fetch_array($pageQry)) {
?>						<div class="box round row-fluid span4">
		<fieldset>
			<legend><?php echo $kolomData[$field[5]];?></legend>
			 
				 <a href="?page=Karakteristik-Subjek-Add&Kode=<?php echo $kolomData[$field[0]];?>" target="_self"><i class="icon-plus"></i> Tambah Karakteristik Subjek</a> 
			 
			<div class="control-group">
				<img src="images/foto/<?php echo $kolomData[$field[13]] ? $kolomData[$field[13]] :"no-image.png";?>"> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[5];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[5]];?></label> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[6];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[6]];?></label> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[7];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[7]];?></label> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[8];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[8]];?></label> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[9];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[9]];?></label> 
			</div>
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[10];?>, <?php echo $isian[11];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[10]];?>,<?php echo $kolomData[$field[11]];?></label> 
			</div> 
			 
			<div class="control-group">
				<label class="control-label" for="input01"><?php echo $isian[12];?></label> 
					<label class="control-label" ><?php echo $kolomData[$field[12]];?></label> 
			</div>
			 
			 
			 
		</fieldset>
		
		</div>
					
<?php } ?>	
</form>  