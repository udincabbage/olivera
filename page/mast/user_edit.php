<?php
include_once "lib/seslogin.php";
include_once "user_lib.php";


if($_GET) {
	if(isset($_POST['btnSave'])){
		$pesanError = array();
		if (trim($_POST['txt1'])=="") {
			$pesanError[] = "Data <b>".$field1."</b> tidak boleh kosong !";		
		}
		$txt1= $_POST['txt1'];
		$txt2= $_POST['txt2'];
		 $txt3= md5($_POST['txt3']); 
		 $txt4= $_POST['txt4'];
		 $txt5= $_POST['txt5'];	 
	
		if (count($pesanError)>=1 ){
            echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
			# SIMPAN PERUBAHAN DATA, Jika jumlah error pesanError tidak ada, simpan datanya
			$mySql	= "UPDATE ".$tableName." SET ".$field1."='$txt1', ".$field2."='$txt2', ".$field3."='$txt3', ".$field4."='$txt4', ".$field5."='$txt5' WHERE ".$field0." ='".$_POST['txt0']."'";
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query".mysqli_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>";
			}
			exit;
		}
	} // Penutup POST
	
	# TAMPILKAN DATA LOGIN UNTUK DIEDIT
	$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txt0']; 
	$sqlShow = "SELECT * FROM ".$tableName." WHERE ".$field0."='$Kode'";
	$qryShow = mysqli_query($koneksidb, $sqlShow)  or die ("Query ambil data kategori salah : ".mysqli_error());
	$dataShow = mysqli_fetch_array($qryShow);
	
		# MASUKKAN DATA KE VARIABEL
		$data0	= $dataShow[$field0];
		$data1	= $dataShow[$field1];
		$data2	= isset($dataShow[$field2]) ?  $dataShow[$field2] : $_POST['txt1'];
		$data2Lm	= $dataShow[$field2];
		$data3	= isset($dataShow[$field3]) ?  $dataShow[$field3] : $_POST['txt3'];
		$data3Lm	= $dataShow[$field3];
		$data4	= isset($dataShow[$field3]) ?  $dataShow[$field4] : $_POST['txt4'];
		$data4Lm	= $dataShow[$field4];
		$data5	= isset($dataShow[$field5]) ?  $dataShow[$field5] : $_POST['txt5'];
		$data5Lm	= $dataShow[$field5];
		$data6	= isset($dataShow[$field6]) ?  $dataShow[$field6] : $_POST['txt6'];
		$data6Lm	= $dataShow[$field6];
		// $data7	= isset($dataShow[$field7]) ?  $dataShow[$field7] : $_POST['txt7'];
} // Penutup GET
?>
<form  class="form-horizontal" action="?page=<?php echo $formName;?>-Edit" method="post" name="form1" target="_self" id="form1">
<fieldset>
							<legend>Ubah <?php echo $formName?></legend>
							<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian1; ?></label>
								<div class="controls">
									<input name="txt1" type="text" class="input-xlarge" id="input01" value="<?php echo $data1; ?>" size="60" maxlength="50"/>
									<input name="txt0" type="hidden" value="<?php echo $Kode; ?>" />
								</div>
							</div>
							<!-- 
							 onkeyup="validHuruf(this)" pattern="[A-Z a-z]{3,56}" 
							  onkeyup="validAngka(this)" pattern="[0-9]{8,12}" 
							   onkeyup="validAngka(this)" pattern="[A-Z a-z]{3,12}" 
							  
							-->
					<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian2; ?></label>
								<div class="controls">
									<input name="txt2" type="text" class="input-xlarge" id="input01" value="<?php echo $data2; ?>" readonly />
									<input name="txtLama" type="hidden" value="<?php echo $data2Lm; ?>" />
								</div>
							</div>
							
					<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian3; ?> Lama</label>
								<div class="controls">
									<input name="txt31" type="password" class="input-xlarge" id="input01" value="" size="60" maxlength="12"/> 
								</div>
							</div>
							
					<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian3; ?> Baru</label>
								<div class="controls">
									<input name="txt3" type="password" class="input-xlarge" id="input01" value=""  size="60" maxlength="12"/> 
								</div>
							</div>
					<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian4; ?></label>
								<div class="controls">
									<input name="txt4" type="text" class="input-xlarge" id="input01" value="<?php echo $data4; ?>" size="60" maxlength="12"/>
									<input name="txtLama" type="hidden" value="<?php echo $data4Lm; ?>" />
								</div>
							</div> 
				 <div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian5; ?></label>
								<div class="controls">
									<select name="txt5" id="txt5"> 
          <option value="1" <?php echo ($data5== '1') ?  "selected" : "" ;  ?>>Administrator</option>
          <option value="2" <?php echo ($data5== '2') ?  "selected" : "" ;  ?>>User</option> 
          </select>
								</div>
							</div> 
				 
								</div>
							</div>
			<div class="form-actions">
								<button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button>
								<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('hapus data yang telah anda ketik?')"/>Reset</button>
		  <button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " onclick="history.back();" />Batal </button>
							</div>				
							 
</form>

