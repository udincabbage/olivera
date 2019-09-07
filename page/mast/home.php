<h1>Beranda</h1>
<?php
	if(isset($_SESSION['MAIN_FROZEN_THRON3'])) {?>
	
	<div class="hero-unit"><legend>Administrasi MonReal (Monitoring Realisasi)</legend>  
	
 

 


	<p> Selamat datang di MonReal (Monitoring Realisasi) Rekapitulasi Pembangunan Daerah, silakan gunakan menu navigasi untuk mencari/merubah informasi lebih lanjut. Anda telah login sebagai <?php echo $_SESSION['MAIN_FROZEN_THRON3']; ?>.</p>
	<?php }
	else if (isset($_SESSION['MAIN_DAS_L4H'])) {?>
	<div class="hero-unit">
	
	<legend>Administrasi MonReal (Monitoring Realisasi)</legend>  
	 
	<p>Selamat datang di MonReal (Monitoring Realisasi) Rekapitulasi Pembangunan Daerah, silakan gunakan menu navigasi untuk mencari/merubah informasi lebih lanjut. Anda telah login sebagai <?php echo $_SESSION['MAIN_DAS_L4H']; ?>.</p>
	 
	<?php }
	else if (isset($_SESSION['MAIN_DOTA_KAH'])) {?>
	<div class="hero-unit">
	<legend>User Register </legend>
	<p> Selamat datang <b><?php echo $_SESSION['NGARAN_SHARPSHOOT3R']; ?></b> di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut.</p>
	<?php }
	else  {?>
	<div class="hero-unit">
	<legend>SELAMAT DATANG di <b>MonReal</b> (Monitoring Realisasi)</legend>
	 
	<div class="well"> 
		<p>Monitoring Realisasi Rekapitulasi Pembangunan Daerah merupakan perwujudan transparansi dan pengembangan inovasi di bidang teknologi dari Pemerintah Kabupaten Balangan khususnya dan pemerintahan Indonesia pada umumnya.</p><p>Aplikasi ini membantu terciptanya pelayanan pelaksanaan rekapitulasi dana pembangunan daerah yang terpadu, efisien serta efektif.</p> 
	</div>
	<?php }?>
</div>
			