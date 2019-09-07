<?php
// include_once "lib/seslogin.php";
include_once "page/lib/dtpesan.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		$pesanError = array();
		if (trim($_POST['txt1'])=="") {
			$pesanError[] = "Data <b>".$field1."</b> tidak boleh kosong !";		
		}
		$txt1= $_POST['txt1'];
		$txt2= $_POST['txt2'];
		$txt3= $_POST['txt3'];
		$txt4= $_POST['txt4'];
		$txt5= $_POST['txt5'];
		// $txt6= '0';
		// $txt7= $_POST['txt7'];
		// $txt8= $_POST['txt8'];
		// $txt9= $_POST['txt9'];
		
		$cekSql="SELECT * FROM ".$tableName." WHERE ".$field1."='$txt1' AND ".$field5."='$txt5'";
		$cekQry=mysqli_query($koneksidb, $cekSql) or die ("Eror Query".mysqli_error()); 
		if(mysqli_num_rows($cekQry)>=1){
			$pesanError[] = "Maaf, ".$isian1." <b> $txt1 </b> ".$isian5." <b> $txt5 </b>  sudah ada, Silakan tunggu pesan anda kami terima.";
		}		

		if (count($pesanError)>=1 ){
            echo "<div class='mssgBox'>";
			echo "<img src='img/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
			// $kodeBaru	= buatKode($tableName, $huruf);
			$mySql	= "INSERT INTO ".$tableName." (".$field1.",".$field2.",".$field3.",".$field4.",".$field5.") VALUES ('$txt1','$txt2','$txt3','$txt4','$txt5')";
			$myQry	= mysqli_query($koneksidb, $mySql) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=".$formName."'>";
			}
			exit;
		}
	} // Penutup POST
	$data0	= buatKode($tableName, $huruftgl);
	$data1	= isset($_POST['txt1']) ? $_POST['txt1'] : '';
	$data2	= isset($_POST['txt2']) ? $_POST['txt2'] : date("Y-m-d");
	$data3	= isset($_POST['txt3']) ? $_POST['txt3'] : '';
	$data4	= isset($_POST['txt4']) ? $_POST['txt4'] : '';
	$data5	= isset($_POST['txt5']) ? $_POST['txt5'] : 0;
	// $data6	= isset($_POST['txt6']) ? $_POST['txt6'] : '';
	// $data7	= isset($_POST['txt7']) ? $_POST['txt7'] : '';
	// $data8	= isset($_POST['txt8']) ? $_POST['txt8'] : '';
	// $data9	= isset($_POST['txt9']) ? $_POST['txt9'] : '';
	// $data10	= isset($_POST['txt10']) ? $_POST['txt10'] : '';
	// $data11	= isset($_POST['txt11']) ? $_POST['txt11'] : '';
} // Penutup GET

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT $tableName.* FROM ".$tableName." WHERE ".$field5."='1' ";

if(isset($_POST['qcari'])){
  $qcari=$_POST['qcari'];
  $pageSql="SELECT $tableName.* FROM ".$tableName." WHERE ".$field5."='1' AND
  ($field1 like '%$qcari%' or $field3 like '%$qcari%' or $field4 like '%$qcari%' or $field5 like '%$qcari%') ";
}
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error paging: ".mysql_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);


?>

<table class="table table-bordered table-striped">
  <tr>
    <td colspan="2"><h1><b> <?php echo $formName;?> </b> 
	<form class="navbar-search pull-right"  method="POST" action="?page=<?php echo $formName?>-Data">
				<input type="text" name="qcari" placeholder="Cari..." autofocus/>
	</form></h1> </td>
  </tr>
  <tr>
  <td >   
  
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
                                       
									   <form id="new-project" class="form-horizontal " action="?page=<?php echo $formName;?>" method="post" name="form1" target="_self">
						<fieldset>
						<table class="table table-striped">
							
    <tr>
      <td width="24%"><b><?php echo $isian1; ?></b></td>
      <td width="2%"><b>:</b></td>
      <td width="74%"><input name="txt1" type="text" class="input-xlarge" value="<?php echo $data1; ?>" size="60" maxlength="60" onkeyup="validHuruf(this)" pattern="[A-Z a-z]{3,56}"  />
	</td>
	
    </tr>
    <input name="txt2" type="hidden" class="input-xlarge" value="<?php echo $data2; ?>" size="60" maxlength="60"  />
	<tr>
      <td><b><?php echo $isian3; ?></b></td>
      <td><b>:</b></td>
      <td>
	  <!--<select name="txt3" id="txt3">
          <option value="1"<?php echo ($data3== '1') ?  "selected" : "" ;  ?>>Ya</option>
          <option value="0"<?php echo ($data3== '0') ?  "selected" : "" ;  ?>>Tidak</option>
         
          </select>-->
		<input name="txt3" type="email" class="input-xlarge" value="<?php echo $data3; ?>" size="60" maxlength="60"   />  
		  </td>
		
    </tr>
    <tr>
      <td><b><?php echo $isian4; ?></b></td>
      <td><b>:</b></td>
      <td><textarea class="input-xlarge" name="txt4" id="txt4" rows="3"><?php echo $data4; ?></textarea></td>
    </tr> <input name="txt5" type="hidden" class="input-xlarge" value="<?php echo $data5; ?>"  /> 
    
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><button type="submit"  name="btnSave" class="btn btn-primary">Simpan</button>
								<button type="reset" class="btn " name="reset" id="reset" onclick="return confirm('Reset data yang telah anda ketik?')"/>Reset</button>
		   <a class="toggle-link" href="#new-project"><button type="button" class="btn " name=" KEMBALI " id="cancel" value=" BATAL " /><!-- onclick="history.back();" --> Batal </button></a></td>
    </tr>
	</table>
						</fieldset>
			</form>
			
                                    </div>
                                </div>
                            </div>
	</div>						
							
							
  
  
  </td>
  
  </tr> 

 
	
	<table class="table table-bordered table-striped">
      
		<?php
		$mySql = $pageSql." ORDER BY ".$field5." DESC LIMIT $hal, $row";
		$myQry = mysqli_query($koneksidb, $mySql)  or die ("Query salah : ".mysql_error());
		$nomor  = 1; 
		while ($kolomData = mysqli_fetch_array($myQry)) {
			
			$Kode = $kolomData[$field0];
			$sub4 = substr($kolomData[$field4],0,445);
		?>
		<tr>
        
        <th width="10%"><span class="badge"><?php echo indonesiaTgl($kolomData[$field2]); ?></span></th><th width="10%"><span class="badge badge-success"><?php echo $kolomData[$field1]; ?></span></th><th width="80%"> &nbsp;</th>
        
      </tr>
      <tr>
        
      
       
        <td colspan="3"> <?php echo $sub4; ?></td>
        		
      </tr>
	  
	  <tr>
        
       <td colspan="3"><strong>&nbsp; </strong></td>
        
      </tr>
      <?php } ?>
    </table>
	
	<table class="table table-bordered table-striped">
	
  <tr>
    <td><strong>Jumlah Data :</strong> <?php echo $jml; ?> </td>
    <td align="right"><b>Halaman ke :</b> 
	<?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=".$formName."-Data&hal=$list[$h]'>$h</a> ";
	}
	?>	</td>
  </tr>
</table>
