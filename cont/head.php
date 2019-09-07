<!DOCTYPE html>
<html lang="en">

<head>
<title>SILAMBDA - Generate by lightningamber 0.1</title><meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>  
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="http://teknobara.co.id">TEKNOBARA</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">15</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<?php
if(isset($_SESSION['SES_MAN']))
{
	include("cont/nav.php");
	include("cont/navlist.php");
}
elseif(isset($_SESSION['SES_TU']))
{
	include("cont/nav.php");
	include("cont/navlist.php");
}
elseif(isset($_SESSION['SES_PRO']))
{
	include("cont/nav.php");
	include("cont/navlist.php");
}
else {
	include("cont/nav-user.php");
	include("cont/navlist-user.php");
}	?>
<!--close-top-Header-menu-->

