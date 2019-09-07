<?php 

$Kode	 = isset($_POST['Kode']) ?  $_POST['Kode'] : $_POST['txt0'];  
$id = isset($_GET['Kode']) ? $_GET['Kode'] : 0; 
// $pageSql2 = "SELECT subjek.*,jenis_subjek.nama AS nama_jenis FROM subjek LEFT JOIN jenis_subjek ON jenis_subjek.id=subjek.id_jenis WHERE  subjek.id=$id ";  
$pageSql2 = "SELECT karakteristik_subjek.*,subjek.nama AS nama_subjek,subjek.alamat,subjek.kelurahan, subjek.kecamatan, subjek.kota, subjek.lat, subjek.lng, subjek.contact_person, subjek.foto FROM karakteristik_subjek 
			LEFT JOIN subjek ON subjek.id=karakteristik_subjek.id_subjek
			LEFT JOIN jenis_subjek ON jenis_subjek.id=subjek.id_jenis
			WHERE karakteristik_subjek.id='$Kode' ";  
$pageQry2 = mysqli_query($koneksidb, $pageSql2) or die ("error paging: ".mysqli_error($koneksidb));  
$kolData = mysqli_fetch_array($pageQry2);

include_once "mast/subjek_config.php"; 

$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis  WHERE $tableName.id !=$Kode ORDER BY $tableName.updated_at DESC "; 
 
 
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

// if(!empty($_POST['objek'])){
// // Loop to store and display values of individual checked checkbox.
// foreach($_POST['objek'] as $selected){
// echo $selected."</br>";
// }
// }
// else { echo "kadada postnya";}

foreach($_POST['objek'] as $hobby) {
echo "<p>".$hobby ."</p>"; //Print all the hobi
// Alert hobi using JS
$show = "<p>".$hobby ."</p>";
}
?>

<table class="table table-striped blue"> 
	<tr> 
	  <td colspan="2"><h1><b>Peta Hasil Objek Perbandingan</b>  
	  <form class="navbar-search pull-right"  method="POST" action="?page=Perbandingan-Hasil&Kode=<?php echo $Kode; ?>">  
	   
		 
		 
		
	  </h1> </td> 
	</tr> 
</table>  	 


<div class="box beda round row-fluid span4">
 <legend>Subjek <?php echo $kolData['nama_subjek']; ?></legend>
 

	<table class="table">

		<tr>
			<img src="images/foto/<?php echo $kolData['foto'] ? $kolData['foto'] :"no-image.png";?>"> 
		</tr>
		<tr>
			<td>Nama Subjek</td>
				<td><?php echo $kolData['nama_subjek'];?></td>
		</tr>
		<tr>
			<td>Alamat</td>
				<td><?php echo $kolData['alamat'];?></td>
		</tr>
		<tr>
			<td>Kelurahan</td>
				<td><?php echo $kolData['kelurahan'];?></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
				<td> <?php echo $kolData['kecamatan'];?> </td>
		</tr>
		<tr>
			<td>Kota</td>
				<td><?php echo $kolData['kota'];?></td>
		</tr>
		<tr>
			<td>Lat,Lng</td>
				<td><?php echo $kolData['lat'];?>, <?php echo $kolData['lng'];?></td>
		</tr> 
		 
		<tr>
			<td><?php echo $isian[12];?></td>
				<td><?php echo $kolData[$field[12]];?></td>
		</tr>
		 
		 
		 
	</table>
	</div>
	 
	<?php
while ($kolomData = mysqli_fetch_array($pageQry)) {
?>	
<div class="box card row-fluid span3">  
		 
		<fieldset>  
			<!-- <legend><?php echo $kolomData[$field[5]];?> </legend>-->
			
			  
			 <div class="container">
			 
				<img src="images/foto/<?php echo $kolomData[$field[13]] ? $kolomData[$field[13]] :"no-image.png";?>"> 
			 
			 
 
		<div class="overlay">
			
			 <table class="table "> 
			<tr>
				<td><?php echo $isian[5];?></td> 
					<td><?php echo $kolomData[$field[5]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[6];?></td> 
					<td><?php echo $kolomData[$field[6]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[7];?></td> 
					<td><?php echo $kolomData[$field[7]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[8];?></td> 
					<td><?php echo $kolomData[$field[8]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[9];?></td> 
					<td><?php echo $kolomData[$field[9]];?></td> 
			</tr>
			<tr>
				<td><?php echo $isian[10];?>, <?php echo $isian[11];?></td> 
					<td><?php echo $kolomData[$field[10]];?>,<?php echo $kolomData[$field[11]];?></td> 
			</tr> 
			 
			<tr>
				<td><?php echo $isian[12];?></td> 
					<td><?php echo $kolomData[$field[12]];?></td> 
				</tr> 
		</table>
		</div>
			 
			
		</fieldset>
		 </form>
		</div>
					
<?php } ?>	 