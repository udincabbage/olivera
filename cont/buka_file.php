<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("page/home.php")) die ("page/404.php"); 
			include "page/home.php";	break;
		
		case 'Error' :				
			if(!file_exists ("page/404.php")) die ("Halaman Rusak!"); 
			include "page/404.php";	break;
			
		case 'Halaman-Utama' :				
			if(!file_exists ("page/home.php")) die ("Sorry Empty Page!"); 
			include "page/home.php";	break;		

		case 'Terima-Kasih' :				
			if(!file_exists ("page/terima_kasih.php")) die ("Sorry Empty Page!"); 
			include "page/terima_kasih.php";	break;	
			
		case 'Latar-Belakang' :				
			if(!file_exists ("page/latar_belakang.php")) die ("Sorry Empty Page!"); 
			include "page/latar_belakang.php";	break;	
			
		case 'Data-Perusahaan' :				
			if(!file_exists ("page/data_perusahaan.php")) die ("Sorry Empty Page!"); 
			include "page/data_perusahaan.php";	break;	
			
		case 'Bidang-Usaha' :				
			if(!file_exists ("page/bidang_usaha.php")) die ("Sorry Empty Page!"); 
			include "page/bidang_usaha.php";	break;	

		# LOGIN USER
		case 'Login' :				
			if(!file_exists ("cont/login.php")) die ("Sorry Empty Page!"); 
			include "cont/login.php"; break;
			
		case 'Login-Validasi' :				
			if(!file_exists ("cont/login_validasi.php")) die ("Sorry Empty Page!"); 
			include "cont/login_validasi.php"; break;
			
		case 'Logout' :				
			if(!file_exists ("cont/login_out.php")) die ("Sorry Empty Page!"); 
			include "cont/login_out.php"; break;		
		
		#DEFAULT PAGE
		case 'Setting' :				
			if(!file_exists ("page/settings.php")) die ("Sorry Empty Page!"); 
			include "page/settings.php"; break;
		case 'Home' :				
			if(!file_exists ("page/home.php")) die ("Sorry Empty Page!"); 
			include "page/home.php"; break;
		case 'Bantuan' :				
			if(!file_exists ("page/help.php")) die ("Sorry Empty Page!"); 
			include "page/help.php"; break;
		case 'Profil' :				
			if(!file_exists ("page/profile.php")) die ("Sorry Empty Page!"); 
			include "page/profile.php"; break; 
		case 'Visi-Misi' :				
			if(!file_exists ("page/visi-misi.php")) die ("Sorry Empty Page!"); 
			include "page/visi-misi.php"; break;
		case 'Dasar-Hukum' :				
			if(!file_exists ("page/hukum.php")) die ("Sorry Empty Page!"); 
			include "page/hukum.php"; break;
		case 'Kontak' :				
			if(!file_exists ("page/kontak.php")) die ("Sorry Empty Page!"); 
			include "page/kontak.php"; break;
			
	
	# MAIN #SUPER ADMIN
		case 'Master' :				
			if(!file_exists ("su/master.php")) die ("Sorry Empty Page!"); 
			include "su/master.php";	break;
	# MAIN #SUPER ADMIN
		case 'Backup-Data' :				
			if(!file_exists ("page/mast/backup-new.php")) die ("Sorry Empty Page!"); 
			include "page/mast/backup-new.php";	break;
	 
			
	# USER DATA  #SUPER ADMIN		
		case 'Pengguna-Data' :				
			if(!file_exists ("page/mast/user_data.php")) die ("Sorry Empty Page!"); 
			include "page/mast/user_data.php";	break;
		case 'Pengguna-Delete' :
			if(!file_exists ("page/mast/user_delete.php")) die ("Sorry Empty Page!"); 
			include "page/mast/user_delete.php"; break;		
		case 'Pengguna-Edit' :				
			if(!file_exists ("page/mast/user_edit.php")) die ("Sorry Empty Page!"); 
			include "page/mast/user_edit.php"; break;			
		case 'Pengguna-Add' :				
			if(!file_exists ("page/mast/user_add.php")) die ("Sorry Empty Page!"); 
			include "page/mast/user_add.php"; break;  	
			
	# ASPEK DATA  #SUPER ADMIN		
		
			case 'Aksesibilitas-Data' :			
			if(!file_exists ('page/mast/aksesibilitas_data.php')) die ($nopage); 
			include 'page/mast/aksesibilitas_data.php'; break;
  
			case 'Aksesibilitas-Edit' :		
			if(!file_exists ('page/mast/aksesibilitas_edit.php')) die ($nopage); 
			include 'page/mast/aksesibilitas_edit.php'; break;
  
			case 'Aksesibilitas-Delete' :			
			if(!file_exists ('page/mast/aksesibilitas_delete.php')) die ($nopage); 
			include 'page/mast/aksesibilitas_delete.php'; break;
  						
 
			case 'Banding-Data' :			
			if(!file_exists ('page/mast/banding_data.php')) die ($nopage); 
			include 'page/mast/banding_data.php'; break;
  
			case 'Banding-Edit' :		
			if(!file_exists ('page/mast/banding_edit.php')) die ($nopage); 
			include 'page/mast/banding_edit.php'; break;
  
			case 'Banding-Delete' :			
			if(!file_exists ('page/mast/banding_delete.php')) die ($nopage); 
			include 'page/mast/banding_delete.php'; break;
  						
 
			case 'Bentuk-Tapak-Data' :			
			if(!file_exists ('page/mast/bentuk-tapak_data.php')) die ($nopage); 
			include 'page/mast/bentuk-tapak_data.php'; break;
  
			case 'Bentuk-Tapak-Edit' :		
			if(!file_exists ('page/mast/bentuk-tapak_edit.php')) die ($nopage); 
			include 'page/mast/bentuk-tapak_edit.php'; break;
  
			case 'Bentuk-Tapak-Delete' :			
			if(!file_exists ('page/mast/bentuk-tapak_delete.php')) die ($nopage); 
			include 'page/mast/bentuk-tapak_delete.php'; break;
  						
 
			case 'Cara-Pembayaran-Data' :			
			if(!file_exists ('page/mast/cara-pembayaran_data.php')) die ($nopage); 
			include 'page/mast/cara-pembayaran_data.php'; break;
  
			case 'Cara-Pembayaran-Edit' :		
			if(!file_exists ('page/mast/cara-pembayaran_edit.php')) die ($nopage); 
			include 'page/mast/cara-pembayaran_edit.php'; break;
  
			case 'Cara-Pembayaran-Delete' :			
			if(!file_exists ('page/mast/cara-pembayaran_delete.php')) die ($nopage); 
			include 'page/mast/cara-pembayaran_delete.php'; break;
  						
 
			case 'Hak-Properti-Data' :			
			if(!file_exists ('page/mast/hak-properti_data.php')) die ($nopage); 
			include 'page/mast/hak-properti_data.php'; break;
  
			case 'Hak-Properti-Edit' :		
			if(!file_exists ('page/mast/hak-properti_edit.php')) die ($nopage); 
			include 'page/mast/hak-properti_edit.php'; break;
  
			case 'Hak-Properti-Delete' :			
			if(!file_exists ('page/mast/hak-properti_delete.php')) die ($nopage); 
			include 'page/mast/hak-properti_delete.php'; break;
  						
 
			case 'Jenis-Subjek-Data' :			
			if(!file_exists ('page/mast/jenis-subjek_data.php')) die ($nopage); 
			include 'page/mast/jenis-subjek_data.php'; break;
  
			case 'Jenis-Subjek-Edit' :		
			if(!file_exists ('page/mast/jenis-subjek_edit.php')) die ($nopage); 
			include 'page/mast/jenis-subjek_edit.php'; break;
  
			case 'Jenis-Subjek-Delete' :			
			if(!file_exists ('page/mast/jenis-subjek_delete.php')) die ($nopage); 
			include 'page/mast/jenis-subjek_delete.php'; break;
  						
 
			case 'Karakteristik-Ekonomi-Data' :			
			if(!file_exists ('page/mast/karakteristik-ekonomi_data.php')) die ($nopage); 
			include 'page/mast/karakteristik-ekonomi_data.php'; break;
  
			case 'Karakteristik-Ekonomi-Edit' :		
			if(!file_exists ('page/mast/karakteristik-ekonomi_edit.php')) die ($nopage); 
			include 'page/mast/karakteristik-ekonomi_edit.php'; break;
  
			case 'Karakteristik-Ekonomi-Delete' :			
			if(!file_exists ('page/mast/karakteristik-ekonomi_delete.php')) die ($nopage); 
			include 'page/mast/karakteristik-ekonomi_delete.php'; break;
  						
 
			case 'Karakteristik-Subjek-Data' :			
			if(!file_exists ('page/mast/karakteristik-subjek_data.php')) die ($nopage); 
			include 'page/mast/karakteristik-subjek_data.php'; break;
  
			case 'Karakteristik-Subjek-Add' :		
			if(!file_exists ('page/mast/karakteristik-subjek_add.php')) die ($nopage); 
			include 'page/mast/karakteristik-subjek_add.php'; break;
  
			case 'Karakteristik-Subjek-Detail' :		
			if(!file_exists ('page/mast/karakteristik-subjek_detail.php')) die ($nopage); 
			include 'page/mast/karakteristik-subjek_detail.php'; break;
  
			case 'Karakteristik-Subjek-Edit' :		
			if(!file_exists ('page/mast/karakteristik-subjek_edit.php')) die ($nopage); 
			include 'page/mast/karakteristik-subjek_edit.php'; break;
  
			case 'Karakteristik-Subjek-Delete' :			
			if(!file_exists ('page/mast/karakteristik-subjek_delete.php')) die ($nopage); 
			include 'page/mast/karakteristik-subjek_delete.php'; break;
  						
 
			case 'Komponen-Non-Reality-Data' :			
			if(!file_exists ('page/mast/komponen-non-reality_data.php')) die ($nopage); 
			include 'page/mast/komponen-non-reality_data.php'; break;
  
			case 'Komponen-Non-Reality-Edit' :		
			if(!file_exists ('page/mast/komponen-non-reality_edit.php')) die ($nopage); 
			include 'page/mast/komponen-non-reality_edit.php'; break;
  
			case 'Komponen-Non-Reality-Delete' :			
			if(!file_exists ('page/mast/komponen-non-reality_delete.php')) die ($nopage); 
			include 'page/mast/komponen-non-reality_delete.php'; break;
  						
 
			case 'Kondisi-Jalan-Depan-Data' :			
			if(!file_exists ('page/mast/kondisi-jalan-depan_data.php')) die ($nopage); 
			include 'page/mast/kondisi-jalan-depan_data.php'; break;
  
			case 'Kondisi-Jalan-Depan-Edit' :		
			if(!file_exists ('page/mast/kondisi-jalan-depan_edit.php')) die ($nopage); 
			include 'page/mast/kondisi-jalan-depan_edit.php'; break;
  
			case 'Kondisi-Jalan-Depan-Delete' :			
			if(!file_exists ('page/mast/kondisi-jalan-depan_delete.php')) die ($nopage); 
			include 'page/mast/kondisi-jalan-depan_delete.php'; break;
  						
 
			case 'Kondisi-Lingkungan-Data' :			
			if(!file_exists ('page/mast/kondisi-lingkungan_data.php')) die ($nopage); 
			include 'page/mast/kondisi-lingkungan_data.php'; break;
  
			case 'Kondisi-Lingkungan-Edit' :		
			if(!file_exists ('page/mast/kondisi-lingkungan_edit.php')) die ($nopage); 
			include 'page/mast/kondisi-lingkungan_edit.php'; break;
  
			case 'Kondisi-Lingkungan-Delete' :			
			if(!file_exists ('page/mast/kondisi-lingkungan_delete.php')) die ($nopage); 
			include 'page/mast/kondisi-lingkungan_delete.php'; break;
  						
 
			case 'Kondisi-Pasar-Data' :			
			if(!file_exists ('page/mast/kondisi-pasar_data.php')) die ($nopage); 
			include 'page/mast/kondisi-pasar_data.php'; break;
  
			case 'Kondisi-Pasar-Edit' :		
			if(!file_exists ('page/mast/kondisi-pasar_edit.php')) die ($nopage); 
			include 'page/mast/kondisi-pasar_edit.php'; break;
  
			case 'Kondisi-Pasar-Delete' :			
			if(!file_exists ('page/mast/kondisi-pasar_delete.php')) die ($nopage); 
			include 'page/mast/kondisi-pasar_delete.php'; break;
  						
 
			case 'Kondisi-Penjualan-Data' :			
			if(!file_exists ('page/mast/kondisi-penjualan_data.php')) die ($nopage); 
			include 'page/mast/kondisi-penjualan_data.php'; break;
  
			case 'Kondisi-Penjualan-Edit' :		
			if(!file_exists ('page/mast/kondisi-penjualan_edit.php')) die ($nopage); 
			include 'page/mast/kondisi-penjualan_edit.php'; break;
  
			case 'Kondisi-Penjualan-Delete' :			
			if(!file_exists ('page/mast/kondisi-penjualan_delete.php')) die ($nopage); 
			include 'page/mast/kondisi-penjualan_delete.php'; break;
  						
 
			case 'Lebar-Jalan-Depan-Data' :			
			if(!file_exists ('page/mast/lebar-jalan-depan_data.php')) die ($nopage); 
			include 'page/mast/lebar-jalan-depan_data.php'; break;
  
			case 'Lebar-Jalan-Depan-Edit' :		
			if(!file_exists ('page/mast/lebar-jalan-depan_edit.php')) die ($nopage); 
			include 'page/mast/lebar-jalan-depan_edit.php'; break;
  
			case 'Lebar-Jalan-Depan-Delete' :			
			if(!file_exists ('page/mast/lebar-jalan-depan_delete.php')) die ($nopage); 
			include 'page/mast/lebar-jalan-depan_delete.php'; break;
  						
 
			case 'Lokasi-Data' :			
			if(!file_exists ('page/mast/lokasi_data.php')) die ($nopage); 
			include 'page/mast/lokasi_data.php'; break;
  
			case 'Lokasi-Edit' :		
			if(!file_exists ('page/mast/lokasi_edit.php')) die ($nopage); 
			include 'page/mast/lokasi_edit.php'; break;
  
			case 'Lokasi-Delete' :			
			if(!file_exists ('page/mast/lokasi_delete.php')) die ($nopage); 
			include 'page/mast/lokasi_delete.php'; break;
  						
 
			case 'Orientasi-Data' :			
			if(!file_exists ('page/mast/orientasi_data.php')) die ($nopage); 
			include 'page/mast/orientasi_data.php'; break;
  
			case 'Orientasi-Edit' :		
			if(!file_exists ('page/mast/orientasi_edit.php')) die ($nopage); 
			include 'page/mast/orientasi_edit.php'; break;
  
			case 'Orientasi-Delete' :			
			if(!file_exists ('page/mast/orientasi_delete.php')) die ($nopage); 
			include 'page/mast/orientasi_delete.php'; break;
  						
 
			case 'Pembanding-Data' :			
			if(!file_exists ('page/mast/pembanding_data.php')) die ($nopage); 
			include 'page/mast/pembanding_data.php'; break;
  
			case 'Pembanding-Edit' :		
			if(!file_exists ('page/mast/pembanding_edit.php')) die ($nopage); 
			include 'page/mast/pembanding_edit.php'; break;
  
			case 'Pembanding-Delete' :			
			if(!file_exists ('page/mast/pembanding_delete.php')) die ($nopage); 
			include 'page/mast/pembanding_delete.php'; break;
  						
 
			case 'Pengaruh-Negatif-Data' :			
			if(!file_exists ('page/mast/pengaruh-negatif_data.php')) die ($nopage); 
			include 'page/mast/pengaruh-negatif_data.php'; break;
  
			case 'Pengaruh-Negatif-Edit' :		
			if(!file_exists ('page/mast/pengaruh-negatif_edit.php')) die ($nopage); 
			include 'page/mast/pengaruh-negatif_edit.php'; break;
  
			case 'Pengaruh-Negatif-Delete' :			
			if(!file_exists ('page/mast/pengaruh-negatif_delete.php')) die ($nopage); 
			include 'page/mast/pengaruh-negatif_delete.php'; break;
  						
 
			case 'Pengeluaran-Segera-Data' :			
			if(!file_exists ('page/mast/pengeluaran-segera_data.php')) die ($nopage); 
			include 'page/mast/pengeluaran-segera_data.php'; break;
  
			case 'Pengeluaran-Segera-Edit' :		
			if(!file_exists ('page/mast/pengeluaran-segera_edit.php')) die ($nopage); 
			include 'page/mast/pengeluaran-segera_edit.php'; break;
  
			case 'Pengeluaran-Segera-Delete' :			
			if(!file_exists ('page/mast/pengeluaran-segera_delete.php')) die ($nopage); 
			include 'page/mast/pengeluaran-segera_delete.php'; break;
  						
 
			case 'Pengguna-Data' :			
			if(!file_exists ('page/mast/pengguna_data.php')) die ($nopage); 
			include 'page/mast/pengguna_data.php'; break;
  
			case 'Pengguna-Edit' :		
			if(!file_exists ('page/mast/pengguna_edit.php')) die ($nopage); 
			include 'page/mast/pengguna_edit.php'; break;
  
			case 'Pengguna-Delete' :			
			if(!file_exists ('page/mast/pengguna_delete.php')) die ($nopage); 
			include 'page/mast/pengguna_delete.php'; break;
  						
 
			case 'Peruntukan-Data' :			
			if(!file_exists ('page/mast/peruntukan_data.php')) die ($nopage); 
			include 'page/mast/peruntukan_data.php'; break;
  
			case 'Peruntukan-Edit' :		
			if(!file_exists ('page/mast/peruntukan_edit.php')) die ($nopage); 
			include 'page/mast/peruntukan_edit.php'; break;
  
			case 'Peruntukan-Delete' :			
			if(!file_exists ('page/mast/peruntukan_delete.php')) die ($nopage); 
			include 'page/mast/peruntukan_delete.php'; break;
  						
 
			case 'Posisi-Tanah-Data' :			
			if(!file_exists ('page/mast/posisi-tanah_data.php')) die ($nopage); 
			include 'page/mast/posisi-tanah_data.php'; break;
  
			case 'Posisi-Tanah-Edit' :		
			if(!file_exists ('page/mast/posisi-tanah_edit.php')) die ($nopage); 
			include 'page/mast/posisi-tanah_edit.php'; break;
  
			case 'Posisi-Tanah-Delete' :			
			if(!file_exists ('page/mast/posisi-tanah_delete.php')) die ($nopage); 
			include 'page/mast/posisi-tanah_delete.php'; break;
  						
 
			case 'Proyek-Data' :			
			if(!file_exists ('page/mast/proyek_data.php')) die ($nopage); 
			include 'page/mast/proyek_data.php'; break;
  
			case 'Proyek-Edit' :		
			if(!file_exists ('page/mast/proyek_edit.php')) die ($nopage); 
			include 'page/mast/proyek_edit.php'; break;
  
			case 'Proyek-Delete' :			
			if(!file_exists ('page/mast/proyek_delete.php')) die ($nopage); 
			include 'page/mast/proyek_delete.php'; break;
  						
 
			case 'Subjek-Data' :			
			if(!file_exists ('page/mast/subjek_data.php')) die ($nopage); 
			include 'page/mast/subjek_data.php'; break;
  
			case 'Subjek-Edit' :		
			if(!file_exists ('page/mast/subjek_edit.php')) die ($nopage); 
			include 'page/mast/subjek_edit.php'; break;
  
			case 'Subjek-Delete' :			
			if(!file_exists ('page/mast/subjek_delete.php')) die ($nopage); 
			include 'page/mast/subjek_delete.php'; break;
  						
 
			case 'Syarat-Pembiayaan-Data' :			
			if(!file_exists ('page/mast/syarat-pembiayaan_data.php')) die ($nopage); 
			include 'page/mast/syarat-pembiayaan_data.php'; break;
  
			case 'Syarat-Pembiayaan-Edit' :		
			if(!file_exists ('page/mast/syarat-pembiayaan_edit.php')) die ($nopage); 
			include 'page/mast/syarat-pembiayaan_edit.php'; break;
  
			case 'Syarat-Pembiayaan-Delete' :			
			if(!file_exists ('page/mast/syarat-pembiayaan_delete.php')) die ($nopage); 
			include 'page/mast/syarat-pembiayaan_delete.php'; break;
  						
 
			case 'Tahun-Pasaran-Data' :			
			if(!file_exists ('page/mast/tahun-pasaran_data.php')) die ($nopage); 
			include 'page/mast/tahun-pasaran_data.php'; break;
  
			case 'Tahun-Pasaran-Edit' :		
			if(!file_exists ('page/mast/tahun-pasaran_edit.php')) die ($nopage); 
			include 'page/mast/tahun-pasaran_edit.php'; break;
  
			case 'Tahun-Pasaran-Delete' :			
			if(!file_exists ('page/mast/tahun-pasaran_delete.php')) die ($nopage); 
			include 'page/mast/tahun-pasaran_delete.php'; break;
  						
 
			case 'Topografi-Data' :			
			if(!file_exists ('page/mast/topografi_data.php')) die ($nopage); 
			include 'page/mast/topografi_data.php'; break;
  
			case 'Topografi-Edit' :		
			if(!file_exists ('page/mast/topografi_edit.php')) die ($nopage); 
			include 'page/mast/topografi_edit.php'; break;
  
			case 'Topografi-Delete' :			
			if(!file_exists ('page/mast/topografi_delete.php')) die ($nopage); 
			include 'page/mast/topografi_delete.php'; break;

  
			case 'Subjek' :			
			if(!file_exists ('page/subject.php')) die ($nopage); 
			include 'page/subject.php'; break;
  
			case 'Aset' :			
			if(!file_exists ('page/aset.php')) die ($nopage); 
			include 'page/aset.php'; break;
  
			case 'Perbandingan' :			
			if(!file_exists ('page/perbandingan.php')) die ($nopage); 
			include 'page/perbandingan.php'; break;
  
			case 'Perbandingan-Add' :			
			if(!file_exists ('page/perbandingan_add.php')) die ($nopage); 
			include 'page/perbandingan_add.php'; break;
  
			case 'Perbandingan-Hasil' :			
			if(!file_exists ('page/perbandingan_hasil.php')) die ($nopage); 
			include 'page/perbandingan_hasil.php'; break;

	 		
		
	}
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("page/home.php")) die ("page/404.php"); 
	include "page/home.php";	
}
?>