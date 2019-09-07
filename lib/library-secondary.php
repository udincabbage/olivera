<?php


function isiTabel($nomor,$kolom,$field){
		echo("<tr>");
		echo("<td aligh=\"center\">".$nomor++."</td>");
		$i=1;
		while($i<=count($field)-1){
			echo("<td> ".$kolom[$field[$i]]." </td>");
			$i++;
		}
		echo("</td>");	
}

function buatTombol($formName,$Kode,$kolom){
	echo("<td class=\"cc\" align=\"center\"><a href=\"?page=".$formName."-Edit&Kode=".$Kode." \" target=\"_self\"><i class=\"icon-edit\"></i></a></td>");
	echo("<td class=\"cc\" align=\"center\"><a href=\"?page=". $formName."-Delete&Kode=".$Kode." \" onclick=\"return confirm('Anda Yakin menghapus Data ".$formName." dengan Nama ".$kolom."? ')\"><i class=\"icon-trash\"></i></a></td>");
}

function tampilTabel($koneksidb,$pageSql, $tableName,$field,$formName,$hal,$row){
	$pageNew = mysqli_query($koneksidb, $pageSql." ORDER BY ".$field[1]." ASC LIMIT $hal, $row") or die ("error paging new : ".$pageSql); 
	$nomor  = 1;  
	while ($kolomData = mysqli_fetch_array($pageNew)) {
		$Kode = $kolomData[$field[0]];
		echo("<tr>");
		echo("<td align=\"center\">".$nomor++."</td>");
		$i=4;
		while($i<=count($field)-1){
			if (is_numeric($kolomData[$field[$i]]))
				{
				echo("<td class='right'> ".$kolomData[$field[$i]]." </td>");
				}
			else 
			echo("<td> ".$kolomData[$field[$i]]." </td>");
			
			$i++;
		}
		echo("</td>");	
		echo("<td class=\"cc\" align=\"center\"><a href=\"?page=".$formName."-Edit&Kode=".$Kode." \" target=\"_self\"><i class=\"icon-edit\"></i></a></td>");
		echo("<td class=\"cc\" align=\"center\"><a href=\"?page=". $formName."-Delete&Kode=".$Kode." \" onclick=\"return confirm('Anda Yakin menghapus Data ".$formName." dengan ".$field[4]." ".$kolomData[4]."? ')\"><i class=\"icon-trash\"></i></a></td>");
		echo("</tr>");	
	}
}

function tabelFooter($jml,$row,$max,$formName){
	echo("<table class=\"table table-bordered table-striped\">");
	echo("<tr><td><strong>Jumlah Data :</strong> ".$jml."</td>
	<td align=\"right\"><b>Halaman ke :</b> ");	
	for ($h = 1; $h <= $max; $h++) {
	$list[$h] = $row * $h - $row;
	echo " <a href='?page=".$formName."-Data&hal=$list[$h]'>$h</a> ";
	}
	echo "	</td> </tr> 	</table>";
}

function getInsert($jml,$field,$txt){
	$s="(".$field[1];
	for($i=4;$i<=$jml;$i++){
		$s = $s.", ".$field[$i];
	}
	
	$s = $s." ) VALUES ('".$txt[4]."'";
	
	for($i=4;$i<=$jml;$i++){
		$s = $s.", '".$txt[$i]."'";
	}
	$s = $s.")";
	return $s;
}

function getInsert2($jml,$field,$txt){
	$s="(".$field[3];
	for($i=4;$i<=$jml;$i++){
		$s = $s.", ".$field[$i];
	}
	
	$s = $s." ) VALUES ('".$txt[4]."'";
	
	for($i=4;$i<=$jml;$i++){
		$s = $s.", '".$txt[$i]."'";
	}
	$s = $s.")";
	return $s;
}

function getUpdate($jml,$field,$txt){
	$s = $field[1]."='".$txt[1]."'";

	for($i=4;$i<=$jml;$i++){
		$s = $s.", ".$field[$i]."='".$txt[$i]."'";
	}
	
	$s = $s." WHERE ".$field[0]."='".$txt[0]."'";
	
	return $s;
}

function cekAda($koneksidb,$tableName,$field,$isian,$txt){
	$cekSql="SELECT * FROM ".$tableName." WHERE ".$field."='".$txt."'";
	$cekQry=mysqli_query($koneksidb, $cekSql) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($cekQry)>=1){
		return true;
	}		
	else{
		return false;
	}
}

 function uploadGambarFoto($txtFile,$direktori,$nama_file,$tipeFile){
						$tmpFilePath = $_FILES[$txtFile]['tmp_name'];
						if($tmpFilePath != ""){
							$directoryName = $direktori;
							if(!is_dir($directoryName)){
								mkdir($directoryName, 0755, True);
							}
							$filePath = $directoryName.'/'.$nama_file.'.'.$tipeFile;
							move_uploaded_file($tmpFilePath, $filePath);
							$width_size = 480;
							$filesave = $filePath;
							$resize_image = $filePath;

							// mendapatkan ukuran width dan height dari image
							list( $width, $height ) = getimagesize($filesave);

							// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
							$k = $height / $width_size;

							// menentukan width yang baru
							$newwidth = $width / $k;

							// menentukan height yang baru
							$newheight = $height / $k;

							// fungsi untuk membuat image yang baru
							$thumb = imagecreatetruecolor($newwidth, $newheight);
							$source = imagecreatefromjpeg($filesave);

							// men-resize image yang baru
							imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

							// menyimpan image yang baru
							imagejpeg($thumb, $resize_image);

							imagedestroy($thumb);
							imagedestroy($source);

							return $nama_file.".".$tipeFile;
						}
					}
?>