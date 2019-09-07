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
		// for($i=4;$i<=$jmlField;$i++){ 
			// if (trim($txt[$i])=="") { 
				// $pesanError[] = "Data <b>".$isian[$i]."</b> tidak boleh kosong !"; 
			// } 
		// } 
 
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
			$mySql	= "INSERT INTO ".$tableName." ".getInsert($jmlField,$field,$txt); 
			// $mySql	= "UPDATE ".$tableName." SET ".getUpdate($jmlField,$field,$txt); 
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query insert :".getInsert($jmlField,$field,$txt)); 
			if($myQry){ 
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."-Data'>"; 
			} 
			exit; 
		} 
 
	} 
 
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txt0']; 
$sqlShow = "SELECT ".$tableName.".* FROM ".$tableName." WHERE ".$field[4]."='$Kode' ORDER BY ".$tableName.".".$field[2]." DESC ";
$qryShow = mysqli_query($koneksidb, $sqlShow)  or die ("Query ambil data salah : ".mysql_error());
$dataShow = mysqli_fetch_array($qryShow);
 
for($i=0;$i<=$jmlField;$i++){
	$data[$i] = $dataShow[$field[$i]];
}


$id = isset($_GET['Kode']) ? $_GET['Kode'] : 0; 
$pageSql2 = "SELECT subjek.*,jenis_subjek.nama AS nama_jenis FROM subjek LEFT JOIN jenis_subjek ON jenis_subjek.id=subjek.id_jenis WHERE  subjek.id=$id ";  
$pageQry2 = mysqli_query($koneksidb, $pageSql2) or die ("error paging: ".mysqli_error($koneksidb));  
$kolData = mysqli_fetch_array($pageQry2);


} // Penutup GET

$today = date('Y-m-d');
?>
<div class="space"></div>

<form  class="form-horizontal" action="?page=<?php echo $formName;?>-Add" method="post" name="form1" target="_self" id="form1">  

<div class="box round row-fluid span7">

<fieldset> 
	<legend>Tambah <?php echo $formName?> <?php echo $kolData['nama']; ?></legend> 
		 
		<input name="txt4" type="hidden" class="input-xlarge" id="input04" value="<?php echo $Kode; ?>"  size="60" maxlength="50" /> 				
			 
		<div class="control-group"> 
			<label class="control-label" for="input04"><?php echo $isian[5]; ?> </label>  
			<div class="controls">  
				<input name="txt5" type="text" class="input-xlarge" id="input04" value="<?php  $ad = str_replace(" ","-",$kolData['nama']); $tm = date('Ym'); echo $tm."-".$ad; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input05"><?php echo $isian[6]; ?></label>  
			<div class="controls">  
				<input name="txt6" type="date" class="input-xlarge" id="input05" value="<?php echo $today; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input06"><?php echo $isian[7]; ?></label>  
			<div class="controls styled-select slate">  
				<select name="txt7" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM hak_properti";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query hak_properti  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[7] == $kolomData1['id']) {
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
			<label class="control-label" for="input07"><?php echo $isian[8]; ?></label>  
			<div class="controls">  
				<select name="txt8" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM syarat_pembiayaan";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query syarat_pembiayaan  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[8] == $kolomData1['id']) {
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
			<label class="control-label" for="input08"><?php echo $isian[9]; ?></label>  
			<div class="controls">  
				<select name="txt9" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM kondisi_penjualan";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query kondisi_penjualan  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[9] == $kolomData1['id']) {
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
			<label class="control-label" for="input09"><?php echo $isian[10]; ?></label>  
			<div class="controls">   
				<select name="txt10" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM pengeluaran_segera";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query pengeluaran_segera  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[10] == $kolomData1['id']) {
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
			<label class="control-label" for="input010"><?php echo $isian[11]; ?></label>  
			<div class="controls">   
				<select name="txt11" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM kondisi_pasar";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query kondisi_pasar  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[11] == $kolomData1['id']) {
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
			<label class="control-label" for="input011"><?php echo $isian[12]; ?></label>  
			<div class="controls">  
				<input name="txt12" type="text" class="input-xlarge" id="tanpa-rupiah" value="<?php echo $data[12]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input012"><?php echo $isian[13]; ?></label>  
			<div class="controls">  
				<select name="txt13" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM posisi_tanah";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query posisi_tanah  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[13] == $kolomData1['id']) {
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
			<label class="control-label" for="input013"><?php echo $isian[14]; ?></label>  
			<div class="controls">  
				<select name="txt14" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM bentuk_tapak";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query posisi_tanah  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[14] == $kolomData1['id']) {
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
			<label class="control-label" for="input014"><?php echo $isian[15]; ?></label>  
			<div class="controls">  
				<select name="txt15" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM topografi";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query topografi  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[15] == $kolomData1['id']) {
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
			<label class="control-label" for="input015"><?php echo $isian[16]; ?></label>  
			<div class="controls">  
				<select name="txt16" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM orientasi";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query orientasi  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[16] == $kolomData1['id']) {
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
			<label class="control-label" for="input016"><?php echo $isian[17]; ?></label>  
			<div class="controls">  
				<input name="txt17" type="text" class="input-xlarge" id="input016" value="<?php echo $data[17]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input017"><?php echo $isian[18]; ?></label>  
			<div class="controls">  
				<select name="txt18" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM kondisi_jalan_depan";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query kondisi_jalan_depan  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[18] == $kolomData1['id']) {
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
			<label class="control-label" for="input018"><?php echo $isian[19]; ?></label>  
			<div class="controls">  
				<select name="txt19" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM peruntukan";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query peruntukan  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[19] == $kolomData1['id']) {
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
			<label class="control-label" for="input019"><?php echo $isian[20]; ?></label>  
			<div class="controls">  
				<select name="txt20" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM karakteristik_ekonomi";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query karakteristik_ekonomi  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[20] == $kolomData1['id']) {
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
			<label class="control-label" for="input020"><?php echo $isian[21]; ?></label>  
			<div class="controls">  
				<select name="txt21" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM komponen_non_realty";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query komponen_non_realty  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[21] == $kolomData1['id']) {
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
			<label class="control-label" for="input021"><?php echo $isian[22]; ?></label>  
			<div class="controls">  
				<input name="txt22" type="text" class="input-xlarge" id="input021" value="<?php echo $data[22]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input022"><?php echo $isian[23]; ?></label>  
			<div class="controls">  
				<select name="txt23" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM cara_pembayaran";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query cara_pembayaran  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[23] == $kolomData1['id']) {
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
			<label class="control-label" for="input023"><?php echo $isian[24]; ?></label>  
			<div class="controls">  
				<input name="txt24" type="text" class="input-xlarge" id="dengan-rupiah" value="<?php echo $data[24]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input024"><?php echo $isian[25]; ?></label>  
			<div class="controls">  
				<input name="txt25" type="text" class="input-xlarge" id="tanpa-rupiah" value="<?php echo $data[25]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input025"><?php echo $isian[26]; ?></label>  
			<div class="controls">  
				<input name="txt26" type="text" class="input-xlarge" id="input025" value="<?php echo $data[26]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input026"><?php echo $isian[27]; ?> </label>  
			<div class="controls">  
				<input name="txt27" type="text" class="input-xlarge" id="tanpa-rupiah" value="<?php echo $data[27]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input027"><?php echo $isian[28]; ?></label>  
			<div class="controls">  
				<input name="txt28" type="text" class="input-xlarge" id="dengan-rupiah" value="<?php echo $data[28]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input028"><?php echo $isian[29]; ?></label>  
			<div class="controls">  
				<select name="txt29" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM lokasi";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query lokasi  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[29] == $kolomData1['id']) {
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
			<label class="control-label" for="input029"><?php echo $isian[30]; ?></label>  
			<div class="controls">  
				<select name="txt30" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM aksesibilitas";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query aksesibilitas  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[30] == $kolomData1['id']) {
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
			<label class="control-label" for="input030"><?php echo $isian[31]; ?></label>  
			<div class="controls">  
				<select name="txt31" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM kondisi_lingkungan";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query kondisi_lingkungan  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[31] == $kolomData1['id']) {
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
			<label class="control-label" for="input031"><?php echo $isian[32]; ?></label>  
			<div class="controls">  
				<select name="txt32" class="input-xlarge"> 
							<?php
							$mySql2 = "SELECT * FROM pengaruh_negatif";
							$myQry = mysqli_query($koneksidb, $mySql2) or die ("Gagal Query pengaruh_negatif  ".mysqli_error($koneksidb));
							while ($kolomData1 = mysqli_fetch_array($myQry)) {
								if ($data[32] == $kolomData1['id']) {
									$cek = "selected";
								} else { $cek=""; }
								
								echo "<option value='$kolomData1[id]' $cek>$kolomData1[nama]</option>";
							}
							$mySql ="";
							?>
							</select>  
			</div> 
		</div> 
<div class="form-actions"> 
							<button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button> 
							<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('hapus data yang telah anda ketik?')"/>Reset</button> 
	  <button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " onclick="history.back();" />Batal </button> 
						</div>	

</div>	 
<div class="box beda round row-fluid span4">
 <legend>Subjek <?php echo $kolData['nama']; ?></legend>
<table class="table table-bordered table-responsive">
      <tr>
        <th width="30" align="center"><strong>No</strong></th>
        <th width="190"><strong><?php echo $isian[5]; ?> Karakteristik</strong></th>
        <th width="80"><strong><?php echo $isian[6]; ?></strong></th>
        <th width="20" >Opsi</th>
      </tr>
		<?php
		$id = isset($_GET['Kode']) ? $_GET['Kode'] : 0; 
	$pageSql3 = "SELECT $tableName.* FROM ".$tableName."   WHERE  $tableName.id_subjek=$id ORDER BY sumber_data DESC";  
	$pageQry3 = mysqli_query($koneksidb, $pageSql3) or die ("error paging: ".mysqli_error($koneksidb));   
		$nomor  = 1; 
		while ($sData = mysqli_fetch_array($pageQry3)) { 
		?>
      <tr>
        <td align="center"> <?php echo $nomor++; ?> </td>
        <td> <?php echo $sData[$field[5]]; ?> </td>
        <td> <?php echo indonesiaTgl($sData[$field[6]]); ?> </td>
		
       <td class="cc" align="center"><a href="?page=<?php echo $formName;?>-Detail&Kode=<?php echo $sData[$field[0]]; ?>" target="_self"><i class="icon-forward"></i></a></td> 
      </tr>
      <?php } ?>
    </table> 
 


<fieldset>




<?php 
include_once "subjek_config.php";  
$id = isset($_GET['Kode']) ? $_GET['Kode'] : 0; 
$pageSql1 = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis WHERE  $tableName.id=$id ";  
$pageQry1 = mysqli_query($koneksidb, $pageSql1) or die ("error paging: ".mysqli_error($koneksidb));  
$kolomData = mysqli_fetch_array($pageQry1);
?>

						<!-- 	<legend><?php echo $kolomData[$field[5]];?></legend> -->
							  
							 
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