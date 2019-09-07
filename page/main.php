
	<?php
	if(isset($_SESSION['SES_MAN'])) {?>
	<legend>ADMINISTRATOR </legend>
	<p> Selamat datang di website kami, silakan gunakan menu navigasi untuk mencari/merubah informasi lebih lanjut. Anda telah login sebagai Administrator.</p>
	<?php }
	else if (isset($_SESSION['SES_TU'])) {?>
	<legend>SALES
	<p> Se </legend>lamat datang di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda telah login sebagai Sales.</p>
	<?php }
	else if (isset($_SESSION['SES_PRO'])) {?>
	<legend>MANAJER </legend>
	<p> Selamat datang di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda telah login sebagai Manager.</p>
	<?php }
	else  {?>
	<legend>USER </legend>
	<p> Selamat datang di website kami, silakan gunakan menu navigasi untuk mencari informasi lebih lanjut. Anda juga bisa menggunakan login untuk memproses lebih lanjut informasi ataupun melakukan perubahan data dalam Sistem Informasi ini</p>
	<?php }?>
