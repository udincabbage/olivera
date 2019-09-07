<?php 
include_once "lib/seslogin.php"; 
include_once "karakteristik-subjek_config.php"; 
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
		$txt[13] = $_POST['txt13']; 
		$txt[14] = $_POST['txt14']; 
		$txt[15] = $_POST['txt15']; 
		$txt[16] = $_POST['txt16']; 
		$txt[17] = $_POST['txt17']; 
		$txt[18] = $_POST['txt18']; 
		$txt[19] = $_POST['txt19']; 
		$txt[20] = $_POST['txt20']; 
		$txt[21] = $_POST['txt21']; 
		$txt[22] = $_POST['txt22']; 
		$txt[23] = $_POST['txt23']; 
		$txt[24] = $_POST['txt24']; 
		$txt[25] = $_POST['txt25']; 
		$txt[26] = $_POST['txt26']; 
		$txt[27] = $_POST['txt27']; 
		$txt[28] = $_POST['txt28']; 
		$txt[29] = $_POST['txt29']; 
		$txt[30] = $_POST['txt30']; 
		$txt[31] = $_POST['txt31']; 
		$txt[32] = $_POST['txt32']; 
 
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
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>"; 
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
<form  class="form-horizontal" action="?page=<?php echo $formName;?>-Edit" method="post" name="form1" target="_self" id="form1">  
<fieldset> 
	<legend>Ubah <?php echo $formName?></legend> 
		<div class="control-group"> 
			<label class="control-label" for="input00"><?php echo $isian[0]; ?></label>  
			<div class="controls">  
				<input name="txt0" type="text" class="input-xlarge" id="input00" value="<?php echo $Kode; ?>"  size="60" maxlength="50" readonly />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input04"><?php echo $isian[4]; ?></label>  
			<div class="controls">  
				<input name="txt4" type="text" class="input-xlarge" id="input04" value="<?php echo $data[4]; ?>"  size="60" maxlength="50" />  
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
		<div class="control-group"> 
			<label class="control-label" for="input013"><?php echo $isian[13]; ?></label>  
			<div class="controls">  
				<input name="txt13" type="text" class="input-xlarge" id="input013" value="<?php echo $data[13]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input014"><?php echo $isian[14]; ?></label>  
			<div class="controls">  
				<input name="txt14" type="text" class="input-xlarge" id="input014" value="<?php echo $data[14]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input015"><?php echo $isian[15]; ?></label>  
			<div class="controls">  
				<input name="txt15" type="text" class="input-xlarge" id="input015" value="<?php echo $data[15]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input016"><?php echo $isian[16]; ?></label>  
			<div class="controls">  
				<input name="txt16" type="text" class="input-xlarge" id="input016" value="<?php echo $data[16]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input017"><?php echo $isian[17]; ?></label>  
			<div class="controls">  
				<input name="txt17" type="text" class="input-xlarge" id="input017" value="<?php echo $data[17]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input018"><?php echo $isian[18]; ?></label>  
			<div class="controls">  
				<input name="txt18" type="text" class="input-xlarge" id="input018" value="<?php echo $data[18]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input019"><?php echo $isian[19]; ?></label>  
			<div class="controls">  
				<input name="txt19" type="text" class="input-xlarge" id="input019" value="<?php echo $data[19]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input020"><?php echo $isian[20]; ?></label>  
			<div class="controls">  
				<input name="txt20" type="text" class="input-xlarge" id="input020" value="<?php echo $data[20]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input021"><?php echo $isian[21]; ?></label>  
			<div class="controls">  
				<input name="txt21" type="text" class="input-xlarge" id="input021" value="<?php echo $data[21]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input022"><?php echo $isian[22]; ?></label>  
			<div class="controls">  
				<input name="txt22" type="text" class="input-xlarge" id="input022" value="<?php echo $data[22]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input023"><?php echo $isian[23]; ?></label>  
			<div class="controls">  
				<input name="txt23" type="text" class="input-xlarge" id="input023" value="<?php echo $data[23]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input024"><?php echo $isian[24]; ?></label>  
			<div class="controls">  
				<input name="txt24" type="text" class="input-xlarge" id="input024" value="<?php echo $data[24]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input025"><?php echo $isian[25]; ?></label>  
			<div class="controls">  
				<input name="txt25" type="text" class="input-xlarge" id="input025" value="<?php echo $data[25]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input026"><?php echo $isian[26]; ?></label>  
			<div class="controls">  
				<input name="txt26" type="text" class="input-xlarge" id="input026" value="<?php echo $data[26]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input027"><?php echo $isian[27]; ?></label>  
			<div class="controls">  
				<input name="txt27" type="text" class="input-xlarge" id="input027" value="<?php echo $data[27]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input028"><?php echo $isian[28]; ?></label>  
			<div class="controls">  
				<input name="txt28" type="text" class="input-xlarge" id="input028" value="<?php echo $data[28]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input029"><?php echo $isian[29]; ?></label>  
			<div class="controls">  
				<input name="txt29" type="text" class="input-xlarge" id="input029" value="<?php echo $data[29]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input030"><?php echo $isian[30]; ?></label>  
			<div class="controls">  
				<input name="txt30" type="text" class="input-xlarge" id="input030" value="<?php echo $data[30]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input031"><?php echo $isian[31]; ?></label>  
			<div class="controls">  
				<input name="txt31" type="text" class="input-xlarge" id="input031" value="<?php echo $data[31]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input032"><?php echo $isian[32]; ?></label>  
			<div class="controls">  
				<input name="txt32" type="text" class="input-xlarge" id="input032" value="<?php echo $data[32]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
<div class="form-actions"> 
							<button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button> 
							<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('hapus data yang telah anda ketik?')"/>Reset</button> 
	  <button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " onclick="history.back();" />Batal </button> 
						</div>											 
</form> 
