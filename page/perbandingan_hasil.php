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
$jumlah = count($_POST['objek']); //menghitung jumlah value yang di centang
 $objeks= "subjek.id=".$_POST['objek'][0]; 
	//echo $objeks;
for($i=1; $i<$jumlah; $i++){
           $objeks.= " OR subjek.id=".$_POST['objek'][$i];
}

$row = 20; 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0; 
$pageSql = "SELECT $tableName.*,jenis_subjek.nama AS nama_jenis FROM ".$tableName." LEFT JOIN jenis_subjek ON jenis_subjek.id=$tableName.id_jenis  WHERE $objeks ORDER BY $tableName.updated_at DESC "; 
 
 
	
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error paging1: ".mysqli_error($koneksidb)); 
$jml	 = mysqli_num_rows($pageQry); 
$max	 = ceil($jml/$row); 
  
?>

<table class="table table-striped blue"> 
	<tr> 
	  <td colspan="2"><h1><b>Peta Hasil Objek Perbandingan</b>  
	  <form class="navbar-search pull-right"  method="POST" action="?page=Perbandingan-Hasil&Kode=<?php echo $Kode; ?>">  
	   
		 
		 
		
	  </h1> </td> 
	</tr> 
</table>  	 


<div class="box beda round row-fluid span3">
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

<div class="box round row-fluid span3">
 <legend>Subjek <?php echo $kolomData['nama']; ?></legend>
 

	<table class="table">

		<tr>
			<img src="images/foto/<?php echo $kolomData['foto'] ? $kolomData['foto'] :"no-image.png";?>"> 
		</tr>
		<tr>
			<td>Nama Subjek</td>
				<td><?php echo $kolomData['nama'];?></td>
		</tr>
		<tr>
			<td>Alamat</td>
				<td><?php echo $kolomData['alamat'];?></td>
		</tr>
		<tr>
			<td>Kelurahan</td>
				<td><?php echo $kolomData['kelurahan'];?></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
				<td> <?php echo $kolomData['kecamatan'];?> </td>
		</tr>
		<tr>
			<td>Kota</td>
				<td><?php echo $kolomData['kota'];?></td>
		</tr>
		<tr>
			<td>Lat,Lng</td>
				<td><?php echo $kolData['lat'];?>, <?php echo $kolomData['lng'];?></td>
		</tr> 
		 
		<tr>
			<td><?php echo $isian[12];?></td>
				<td><?php echo $kolomData[$field[12]];?></td>
		</tr>
		 
		 
		 
	</table>
	</div>
					
<?php } ?>	 