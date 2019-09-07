<?php 
include_once "lib/seslogin.php"; 
include_once "kondisi-lingkungan_config.php"; 
if($_GET) { 
	if(isset($_POST['btnSave'])){ 
 
		$txt[1] = ''; 
		$txt[2] = date('Y-m-d H:i:s'); 
		$txt[3] = '0'; 
		$txt[4] = $_POST['txt4']; 
		$txt[5] = $_POST['txt5']; 
		$txt[6] = $_POST['txt6']; 
 
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
		<th width="10" colspan="2"><strong>Option</strong></td> 
	</tr> 
<?php 
tampilTabel($koneksidb,$pageSql,$tableName,$field,$formName,$hal,$row); 
?> 
</table> 
<?php tabelFooter($jml,$row,$max,$formName) ?> 
