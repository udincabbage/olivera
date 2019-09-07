<?php 
include_once "lib/seslogin.php"; 
include_once "karakteristik-subjek_config.php"; 

$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txt0'];  
$id = isset($_GET['Kode']) ? $_GET['Kode'] : 0; 
// $pageSql2 = "SELECT subjek.*,jenis_subjek.nama AS nama_jenis FROM subjek LEFT JOIN jenis_subjek ON jenis_subjek.id=subjek.id_jenis WHERE  subjek.id=$id ";  
$pageSql2 = "SELECT karakteristik_subjek.*,subjek.nama AS nama_subjek,subjek.alamat,subjek.kelurahan, subjek.kecamatan, subjek.kota, subjek.lat, subjek.lng, subjek.contact_person, subjek.foto FROM karakteristik_subjek 
			LEFT JOIN subjek ON subjek.id=karakteristik_subjek.id_subjek
			LEFT JOIN jenis_subjek ON jenis_subjek.id=subjek.id_jenis
			WHERE karakteristik_subjek.id='$Kode' ";  
$pageQry2 = mysqli_query($koneksidb, $pageSql2) or die ("error paging: ".mysqli_error($koneksidb));  
$kolData = mysqli_fetch_array($pageQry2);

?><div class="space"></div>
<form  class="form-horizontal" action="?page=<?php echo $formName;?>-Add" method="post" name="form1" target="_self" id="form1">  

<div class="box beda round row-fluid span4">
 <legend>Subjek <?php echo $kolData['nama_subjek']; ?></legend>
 

<fieldset>


   
							 
							<div class="control-group">
								<img src="images/foto/<?php echo $kolData['foto'] ? $kolData['foto'] :"no-image.png";?>"> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Nama Subjek</label> 
									<label class="control-label" ><?php echo $kolData['nama_subjek'];?></label> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Alamat</label> 
									<label class="control-label" ><?php echo $kolData['alamat'];?></label> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Kelurahan</label> 
									<label class="control-label" ><?php echo $kolData['kelurahan'];?></label> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Kecamatan</label> 
									<label class="control-label" > <?php echo $kolData['kecamatan'];?> </label> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Kota</label> 
									<label class="control-label" ><?php echo $kolData['kota'];?></label> 
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Lat,Lng</label> 
									<label class="control-label" ><?php echo $kolData['lat'];?>, <?php echo $kolData['lng'];?></label> 
							</div> 
							 
							<div class="control-group">
								<label class="control-label" for="input01"><?php echo $isian[12];?></label> 
									<label class="control-label" ><?php echo $kolData[$field[12]];?></label> 
							</div>
							 
							 
							 
						</fieldset>
</div>

<?php
include_once "karakteristik-subjek_config.php"; 
$sqlShow = "SELECT karakteristik_subjek.* FROM karakteristik_subjek WHERE karakteristik_subjek.id='$Kode'";
$qryShow = mysqli_query($koneksidb, $sqlShow)  or die ("Query ambil data salah : ".mysql_error());
$data = mysqli_fetch_array($qryShow);

?>

<div class="box round row-fluid span7">

<fieldset> 
	<legend>Detail <?php echo $formName?> <?php echo $data[5]; ?></legend> 
		 
		<input name="txt4" type="hidden" class="input-xlarge" id="input04" value="<?php echo $Kode; ?>"  size="60" maxlength="50" /> 				
			 
		<div class="control-group"> 
			<label class="control-label" for="input04"><?php echo $isian[5]; ?> </label>  
			<div class="controls">  
				<input name="txt5" type="text" class="input-xlarge" id="input04" value="<?php echo $data[5]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input05"><?php echo $isian[6]; ?></label>  
			<div class="controls">  
				<input name="txt6" type="date" class="input-xlarge" id="input05" value="<?php echo $data[6]; ?>"  size="60" maxlength="50" />  
			</div> 
		</div> 
		<div class="control-group"> 
			<label class="control-label" for="input06"><?php echo $isian[7]; ?></label>  
			<div class="controls">  
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

</div>	 
