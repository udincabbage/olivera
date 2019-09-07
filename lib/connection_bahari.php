<?php
// Variabel koneksi
$myHost	= "localhost";
$myUser	= "u861839160_ikm";
$myPass	= "123ikm";
$myDbs	= "u861839160_ikm";

// Konek ke MySQL Server 
$koneksidb	= mysql_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Failed Connection !";
}

// Memilih database pd MySQL Server
mysql_select_db($myDbs) or die ("Database not Found !");
?>