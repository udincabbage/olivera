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
		$txt6= 'xxx'; 
		
		$cekSql="SELECT * FROM ".$tableName." WHERE ".$field2."='$txt2'";
		$cekQry=mysqli_query($koneksidb, $cekSql) or die ("Eror Query".mysqli_error()); 
		if(mysqli_num_rows($cekQry)>=1){
			$pesanError[] = "Maaf, ".$isian2." <b> $txt2 </b> sudah ada, ganti dengan yang lain";
		}		

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
		 
			$mySql	= "INSERT INTO ".$tableName." (".$field1.",".$field2.",".$field3.",".$field4.",".$field5.",".$field6.") VALUES ('$txt1','$txt2','$txt3','$txt4','$txt5','$txt6')";
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query".mysqli_error($koneksidb));
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>";
			}
			exit;
		}
	} // Penutup POST
	// $data0	= buatKode($tableName, $huruf);
	$data1	= isset($_POST['txt1']) ? $_POST['txt1'] : '';
	$data2	= isset($_POST['txt2']) ? $_POST['txt2'] : '';
	$data3	= isset($_POST['txt3']) ? $_POST['txt3'] : '';
	 $data4	= isset($_POST['txt4']) ? $_POST['txt4'] : '';
	$data5	= isset($_POST['txt5']) ? $_POST['txt5'] : '';
	$data6	= isset($_POST['txt6']) ? $_POST['txt6'] : '';
	$data7	= isset($_POST['txt7']) ? $_POST['txt7'] : '';
} // Penutup GET


?>


  <form id="new-project" class="form-horizontal" action="?page=<?php echo $formName;?>-Add" method="post" name="form1" target="_self">
						<fieldset>
						 
						<table class="table table-bordered table-striped">
							<tr>
      <th colspan="3" scope="col"><h1>Tambah  <?php  echo $formName ?> </h1></th>
    </tr>
    <tr>
      <td width="24%"><b><?php echo $isian1; ?></b></td>
      <td width="2%"><b>:</b></td>
      <td width="74%"><input name="txt1" type="text" class="input-xxlarge" value="<?php echo $data1; ?>" size="60"  maxlength="50" autofocus required/></td>
    </tr>
    <tr>
      <td><b><?php echo $isian2; ?></b></td>
      <td><b>:</b></td>
      <td><input name="txt2" type="text" value="<?php echo $data2; ?>"  class="input-xlarge" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b><?php echo $isian3; ?></b></td>
      <td><b>:</b></td>
      <td><input name="txt3" type="password" value="<?php echo $data3; ?>"  class="input-xlarge" size="60"maxlength="12" required/></td> 
    </tr>
	<tr>
      <td><b>Ulang <?php echo $isian3; ?></b></td>
      <td><b>:</b></td>
      <td><input name="txt31" type="password" value=""  class="input-xlarge" size="60"maxlength="12" required/></td> 
    </tr>
    <tr>
      <td><b><?php echo $isian4; ?></b></td>
      <td><b>:</b></td>
      <td><input name="txt4" type="email" value="<?php echo $data4; ?>" class="input-xxlarge" size="60" maxlength="16" required /></td>
	  <!-- onkeyup="validHuruf(this)" pattern="[A-Z a-z]{3,56}" ||
	  onkeyup="validAngka(this)"  pattern="[0-9]{8,12}"  || 
	  pattern="[a-z,0-9]{3,16}" --> 
    </tr>
    <tr>
      <td><b><?php echo $isian5; ?></b></td>
      <td><b>:</b></td>
      <td><select name="txt5"/>
	  <option value="1">Administrator</option>
	  <option value="2">User</option>
	  </td>
    </tr>
  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button>
								<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('hapus data yang telah anda ketik?')"/>Reset</button>
		   <button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL "  onclick="history.back();"/> Batal </button></td>
    </tr>
	</table>
						</fieldset>
			</form>
 
  </td>
  
  </tr> 
</table>
