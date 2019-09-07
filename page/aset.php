<?php

include_once "mast/subjek_config.php"; 
$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis "; 
 
if(isset($_POST['qcari'])){ 
  $qcari=$_POST['qcari']; 
  $pageSql="SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis WHERE  (".$tableName.".".$field[5]." like '%$qcari%') ORDER BY ".$tableName.".".$field[2]." DESC "; 
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
	  <form class="navbar-search pull-right"  method="POST" action="?page=Aset">  
		  <input type="text" name="qcari" placeholder="Cari..." autofocus/> 
	  </form></h1> </td> 
	</tr> 
</table>  	 
	<form id="edit-profile" class="form-horizontal">
	<?php
while ($kolomData = mysqli_fetch_array($pageQry)) {
?>						<div class="box card row-fluid span4">
		<fieldset>
			<legend><?php echo $kolomData[$field[5]];?></legend>
			  
			 <div class="container">
			 
				<img src="images/foto/<?php echo $kolomData[$field[13]] ? $kolomData[$field[13]] :"no-image.png";?>"> 
			 
			 
 
		<div class="overlay">
			
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
  
     
  </div>
</div>
			 
			 
		</fieldset>
		
		</div>
					
<?php } ?>	
</form>  