<?php 
include_once "lib/seslogin.php"; 
include_once "subjek_config.php"; 
if($_GET) { 
	if(isset($_POST['btnSave'])){ 
 
		$txt[0] = $_POST['txt0']; 
		$txt[2] = date('Y-m-d H:i:s'); 
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
		$txt[13] = $_POST['txt12']; 
		$nama_gambar = str_replace(" ","-",strtolower($_POST['txt5']));
		$txt[13] = $nama_gambar.".jpg";
		$txt13 = $_FILES['txt12'];
		
		$gambarLama = $_POST['flam'];
 
		$pesanError = array(); 
		for($i=4;$i<=$jmlField;$i++){ 
			if (trim($txt[$i])=="") { 
				$pesanError[] = "Data <b>".$isian[$i]."</b> tidak boleh kosong !"; 
			} 
		} 
 
		//$ada = cekAda($koneksidb,$tableName,$field[1],$isian[1],$txt[1]); 
		//if($ada)        {  
		//	$pesanError[] = "Maaf, ".$isian[1]." <b> ".$txt[1]." </b> Sudah Ada.";	 
		//} 
 
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
			$mySql	= "UPDATE ".$tableName." SET ".getUpdate($jmlField,$field,$txt); 
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query insert :".getInsert($jmlField,$field,$txt)); 
			if($myQry){ 
				if($_FILES['txt12']['name']!=null){
					unlink ("images/foto/$gambarLama");
					uploadGambarFoto('txt13','images/txt13/',$nama_gambar,'jpg');
					}else if($gambarLama != $nama_gambar.".jpg"){
					$directoryName = "images/foto/$eks->nama";
					if(!is_dir($directoryName)){
					mkdir($directoryName, 0755, True);
					}
					rename("images/foto/$gambarLama","images/foto/$nama_gambar.jpg");
					}
				echo "<meta http-equiv='refresh' content='10; url=?page=".$formName."-Data'>"; 
			} 
			exit; 
		} 
 
	} 
 
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txt0']; 
$sqlShow = "SELECT * FROM ".$tableName." WHERE ".$field[0]."='$Kode'";
$qryShow = mysqli_query($koneksidb, $sqlShow)  or die ("Query ambil data salah : ".mysql_error());
$dataShow = mysqli_fetch_array($qryShow);
 
for($i=0;$i<=$jmlField;$i++){
	$data[$i] = $dataShow[$field[$i]];
}
} // Penutup GET
?>
<form  class="form-horizontal" action="?page=<?php echo $formName;?>-Edit" method="post" name="form1" target="_self" id="form1" enctype="multipart/form-data" >  

<fieldset> 
	<legend>Ubah <?php echo $formName?> <b><?php echo $data[5]; ?></b></legend> 
	
<div class="row-fluid span8">
		<div class="control-group"> 
			<label class="control-label" for="input00"><?php echo $isian[0]; ?></label>  
			<div class="controls">  
				<input name="txt0" type="text" class="input-xlarge" id="input00" value="<?php echo $Kode; ?>"  size="60" maxlength="50" readonly />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input04"><?php echo $isian[4]; ?></label>  
			<div class="controls">  
				<select name="txt4" class="input-xlarge"> 
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
							</select>
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input05"><?php echo $isian[5]; ?></label>  
			<div class="controls">  
				<input name="txt5" type="text" class="input-xlarge" id="input05" value="<?php echo $data[5]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input06"><?php echo $isian[6]; ?></label>  
			<div class="controls">  
				<input name="txt6" type="text" class="input-xlarge" id="input06" value="<?php echo $data[6]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input07"><?php echo $isian[7]; ?></label>  
			<div class="controls">  
				<input name="txt7" type="text" class="input-xlarge" id="input07" value="<?php echo $data[7]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input08"><?php echo $isian[8]; ?></label>  
			<div class="controls">  
				<input name="txt8" type="text" class="input-xlarge" id="input08" value="<?php echo $data[8]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input09"><?php echo $isian[9]; ?></label>  
			<div class="controls">  
				<input name="txt9" type="text" class="input-xlarge" id="input09" value="<?php echo $data[9]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input010"><?php echo $isian[10]; ?></label>  
			<div class="controls">  
				<input name="txt10" type="text" class="input-xlarge" id="input010" value="<?php echo $data[10]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input011"><?php echo $isian[11]; ?></label>  
			<div class="controls">  
				<input name="txt11" type="text" class="input-xlarge" id="input011" value="<?php echo $data[11]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input012"><?php echo $isian[12]; ?></label>  
			<div class="controls">  
				<input name="txt12" type="text" class="input-xlarge" id="input012" value="<?php echo $data[12]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<input name="flam" type="hidden" class="input-xlarge" id="input013" value="<?php echo $data[13]; ?>"  size="60" maxlength="50" />
		
		<div class="control-group"> 
			<label class="control-label" for="input013"><?php echo $isian[13]; ?></label>  
			<div class="controls">  
				<input name="txt12" type="file" class="input-xlarge" id="input013" value=""  size="60" maxlength="50" />   
			</div> 
		</div> 
</div> 
		
<div class="row-fluid span3">
<img src="images/foto/<?php echo $data[13]; ?>">
</div> 
<div class="row-fluid span12">
<div class="form-actions"> 
							<button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button> 
							<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('hapus data yang telah anda ketik?')"/>Reset</button> 
	  <button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " onclick="history.back();" />Batal </button> 
						</div>	
</div>											 
</form> 
