<?php 
// include ('lib\connection.php');
if($_GET) { 
	if(isset($_POST['btnLogin'])){
		$pesanError = array();
		if ( trim($_POST['txtUser'])=="") {
			$pesanError[] = "Data <b> User ID </b>  tidak boleh kosong !";		
		}
		if (trim($_POST['txtPassword'])=="") {
			$pesanError[] = "Data <b> Password </b> tidak boleh kosong !";		
		}
		#if (trim($_POST['cmbLevel'])=="BLANK") {
		#	$pesanError[] = "Data <b>Level</b> belum dipilih !";		
		#}
		
		# Baca variabel form
		$txtUser 	= mysqli_real_escape_string($koneksidb,$_POST['txtUser']);
		$txtUser 	= str_replace("'","&acute;",$txtUser);
		
		$txtPassword=mysqli_real_escape_string($koneksidb,$_POST['txtPassword']);
		$txtPassword= str_replace("'","&acute;",$txtPassword);
		
		#$cmbLevel	=$_POST['cmbLevel'];
		
		# JIKA ADA PESAN ERROR DARI VALIDASI
		if (count($pesanError)>=1 ){
            echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
			
			// Tampilkan lagi form login
			echo "<meta http-equiv='refresh' content='0; url=?page=Halaman-Utama'>";
		}
		else {
			# LOGIN CEK KE TABEL USER LOGIN
			$loginSql = "SELECT * FROM pengguna WHERE username='".$txtUser.
						#"' AND password='".md5($txtPassword)."' AND level='$cmbLevel'";
						"' AND password='".md5($txtPassword)."'";
			$loginQry = mysqli_query($koneksidb, $loginSql)  
						or die ("Query Salah : ".mysql_error());

			if($loginQry){
				if (mysqli_num_rows($loginQry) >=1) {
					$loginData = mysqli_fetch_array($loginQry);
					$_SESSION['SES_LOGIN'] = $loginData['username']; 
					$_SESSION['SES_USER'] = $loginData['password']; 
					$_SESSION['ID_USER'] = $loginData['id']; 
					$_SESSION['USERNAME'] = $loginData['username']; 
					if($loginData['level']=="1") {
					$_SESSION['SES_MAN'] = "1";
					}
					
					if($loginData['level']=="2") {
					$_SESSION['SES_TU'] = "2";
					}
					
					if($loginData['level']=="3") {
					$_SESSION['SES_PRO'] = "3";
					}
					// Refresh
					echo "<meta http-equiv='refresh' content='0; url=?page=Halaman-Utama'>";
				}
				else {
					echo "<div class='mssgBox'>";
					echo "<img src='images/attention.png'> <br><hr>";
					 echo "Username atau Password Salah  ";
					 echo "</hr></div>  ";
				}
			}
		}
	} // End POST
	else
	{
		session_unset();
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=?page'>";
		exit;
	}
} // End GET
?>
 
