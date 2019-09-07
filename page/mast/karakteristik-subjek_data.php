<?php 
include_once "lib/seslogin.php"; 
include_once "karakteristik-subjek_config.php"; 
if($_GET) { 
	if(isset($_POST['btnSave'])){ 
 
		$txt[1] = ''; 
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
 
		$ada = cekAda($koneksidb,$tableName,$field[4],$isian[4],$txt[4]); 
		if($ada)        {  
			$pesanError[] = "Maaf, ".$isian[4]." <b> ".$txt[4]." </b> Sudah Ada.";	 
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
			$mySql	= "INSERT INTO ".$tableName." ".getInsert($jmlField,$field,$txt); 
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query insert :".getInsert($jmlField,$field,$txt)); 
			if($myQry){ 
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>"; 
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
	$data[9]	= isset($_POST['txt9']) ? $_POST['txt9'] : ''; 
	$data[10]	= isset($_POST['txt10']) ? $_POST['txt10'] : ''; 
	$data[11]	= isset($_POST['txt11']) ? $_POST['txt11'] : ''; 
	$data[12]	= isset($_POST['txt12']) ? $_POST['txt12'] : ''; 
	$data[13]	= isset($_POST['txt13']) ? $_POST['txt13'] : ''; 
	$data[14]	= isset($_POST['txt14']) ? $_POST['txt14'] : ''; 
	$data[15]	= isset($_POST['txt15']) ? $_POST['txt15'] : ''; 
	$data[16]	= isset($_POST['txt16']) ? $_POST['txt16'] : ''; 
	$data[17]	= isset($_POST['txt17']) ? $_POST['txt17'] : ''; 
	$data[18]	= isset($_POST['txt18']) ? $_POST['txt18'] : ''; 
	$data[19]	= isset($_POST['txt19']) ? $_POST['txt19'] : ''; 
	$data[20]	= isset($_POST['txt20']) ? $_POST['txt20'] : ''; 
	$data[21]	= isset($_POST['txt21']) ? $_POST['txt21'] : ''; 
	$data[22]	= isset($_POST['txt22']) ? $_POST['txt22'] : ''; 
	$data[23]	= isset($_POST['txt23']) ? $_POST['txt23'] : ''; 
	$data[24]	= isset($_POST['txt24']) ? $_POST['txt24'] : ''; 
	$data[25]	= isset($_POST['txt25']) ? $_POST['txt25'] : ''; 
	$data[26]	= isset($_POST['txt26']) ? $_POST['txt26'] : ''; 
	$data[27]	= isset($_POST['txt27']) ? $_POST['txt27'] : ''; 
	$data[28]	= isset($_POST['txt28']) ? $_POST['txt28'] : ''; 
	$data[29]	= isset($_POST['txt29']) ? $_POST['txt29'] : ''; 
	$data[30]	= isset($_POST['txt30']) ? $_POST['txt30'] : ''; 
	$data[31]	= isset($_POST['txt31']) ? $_POST['txt31'] : ''; 
	$data[32]	= isset($_POST['txt32']) ? $_POST['txt32'] : ''; 
} 
$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.* FROM ".$tableName; 
 
if(isset($_POST['qcari'])){ 
  $qcari=$_POST['qcari']; 
  $pageSql="SELECT $tableName.* FROM ".$tableName." WHERE  (".$field[2]." like '%$qcari%') ORDER BY ".$field[2]." "; 
} 
 
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error paging: ".$pageSql); 
$jml	 = mysqli_num_rows($pageQry); 
$max	 = ceil($jml/$row); 
 
?> 
 
<table class="table table-striped"> 
	<tr> 
	  <td colspan="2"><h1><b> <?php echo $formName;?> </b>  
	  <form class="navbar-search pull-right"  method="POST" action="?page=<?php echo $formName?>-Data">  
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
			  <form id="new-project" class="form-horizontal " action="?page=<?php echo $formName;?>-Data" method="post" name="form1" target="_self"> 
				  <fieldset> 
					<table class="table table-striped"> 
						<tr> 
							<td width="24%"><b><?php echo $isian[4]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt4" type="text" class="input-xxlarge" value="<?php echo $data[4]; ?>" size="60" maxlength="60"  /></td>  
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
							<td width="74%"><input name="txt13" type="text" class="input-xxlarge" value="<?php echo $data[13]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[14]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt14" type="text" class="input-xxlarge" value="<?php echo $data[14]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[15]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt15" type="text" class="input-xxlarge" value="<?php echo $data[15]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[16]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt16" type="text" class="input-xxlarge" value="<?php echo $data[16]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[17]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt17" type="text" class="input-xxlarge" value="<?php echo $data[17]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[18]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt18" type="text" class="input-xxlarge" value="<?php echo $data[18]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[19]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt19" type="text" class="input-xxlarge" value="<?php echo $data[19]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[20]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt20" type="text" class="input-xxlarge" value="<?php echo $data[20]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[21]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt21" type="text" class="input-xxlarge" value="<?php echo $data[21]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[22]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt22" type="text" class="input-xxlarge" value="<?php echo $data[22]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[23]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt23" type="text" class="input-xxlarge" value="<?php echo $data[23]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[24]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt24" type="text" class="input-xxlarge" value="<?php echo $data[24]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[25]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt25" type="text" class="input-xxlarge" value="<?php echo $data[25]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[26]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt26" type="text" class="input-xxlarge" value="<?php echo $data[26]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[27]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt27" type="text" class="input-xxlarge" value="<?php echo $data[27]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[28]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt28" type="text" class="input-xxlarge" value="<?php echo $data[28]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[29]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt29" type="text" class="input-xxlarge" value="<?php echo $data[29]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[30]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt30" type="text" class="input-xxlarge" value="<?php echo $data[30]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[31]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt31" type="text" class="input-xxlarge" value="<?php echo $data[31]; ?>" size="60" maxlength="60"  /></td>  
						</tr> 
						<tr> 
							<td width="24%"><b><?php echo $isian[32]; ?></b></td>  
							<td width="2%"><b>:</b></td>  
							<td width="74%"><input name="txt32" type="text" class="input-xxlarge" value="<?php echo $data[32]; ?>" size="60" maxlength="60"  /></td>  
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
<table class="table table-bordered table-striped table-responsive"> 
	<tr> 
		<th width="60" align="center"><strong>No</strong></th> 
		<th><strong><?php echo $isian[4]; ?></strong></th> 
		<th><strong><?php echo $isian[5]; ?></strong></th> 
		<th><strong><?php echo $isian[6]; ?></strong></th> 
		<th><strong><?php echo $isian[7]; ?></strong></th> 
		<th><strong><?php echo $isian[8]; ?></strong></th> 
		<th><strong><?php echo $isian[9]; ?></strong></th> 
		<th><strong><?php echo $isian[10]; ?></strong></th> 
		<th><strong><?php echo $isian[11]; ?></strong></th> 
		<th><strong><?php echo $isian[12]; ?></strong></th> 
		<th><strong><?php echo $isian[13]; ?></strong></th> 
		<th><strong><?php echo $isian[14]; ?></strong></th> 
		<th><strong><?php echo $isian[15]; ?></strong></th> 
		<th><strong><?php echo $isian[16]; ?></strong></th> 
		<th><strong><?php echo $isian[17]; ?></strong></th> 
		<th><strong><?php echo $isian[18]; ?></strong></th> 
		<th><strong><?php echo $isian[19]; ?></strong></th> 
		<th><strong><?php echo $isian[20]; ?></strong></th> 
		<th><strong><?php echo $isian[21]; ?></strong></th> 
		<th><strong><?php echo $isian[22]; ?></strong></th> 
		<th><strong><?php echo $isian[23]; ?></strong></th> 
		<th><strong><?php echo $isian[24]; ?></strong></th> 
		<th><strong><?php echo $isian[25]; ?></strong></th> 
		<th><strong><?php echo $isian[26]; ?></strong></th> 
		<th><strong><?php echo $isian[27]; ?></strong></th> 
		<th><strong><?php echo $isian[28]; ?></strong></th> 
		<th><strong><?php echo $isian[29]; ?></strong></th> 
		<th><strong><?php echo $isian[30]; ?></strong></th> 
		<th><strong><?php echo $isian[31]; ?></strong></th> 
		<th><strong><?php echo $isian[32]; ?></strong></th> 
		<th width="10" colspan="2"><strong>Option</strong></td> 
	</tr> 
<?php 
tampilTabel($koneksidb,$pageSql,$tableName,$field,$formName,$hal,$row); 
?> 
</table> 
<?php tabelFooter($jml,$row,$max,$formName) ?> 
