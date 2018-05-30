<?php
   include('ypal_trans_session.php');
?>

<html>
<head>
 
  <?php include('ypal_trans_menu.php'); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" data-topoth=<?php
	mysqli_set_charset($db,'utf8');
	$sql = "SELECT TRANS_NAME FROM ypal_trans WHERE TRANS_USERNAME = '".$_SESSION['login_user']."'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo "\"".$row['TRANS_NAME']."\"";?> src="webqr.js"></script>
	<script type="text/javascript" src="grid.js"></script>
	<script type="text/javascript" src="version.js"></script>
	<script type="text/javascript" src="detector.js"></script>
	<script type="text/javascript" src="formatinf.js"></script>
	<script type="text/javascript" src="errorlevel.js"></script>
	<script type="text/javascript" src="bitmat.js"></script>
	<script type="text/javascript" src="datablock.js"></script>
	<script type="text/javascript" src="bmparser.js"></script>
	<script type="text/javascript" src="datamask.js"></script>
	<script type="text/javascript" src="rsdecoder.js"></script>
	<script type="text/javascript" src="gf256poly.js"></script>
	<script type="text/javascript" src="gf256.js"></script>
	<script type="text/javascript" src="decoder.js"></script>
	<script type="text/javascript" src="qrcode.js"></script>
	<script type="text/javascript" src="findpat.js"></script>
	<script type="text/javascript" src="alignpat.js"></script>
	<script type="text/javascript" src="databr.js"></script>
</head>

	 <style>
	body{
		background-color: #30373B;  
	}
	div{
    	color: white;
	}

</style>

<body onload="load()">

	<p> <font color="white"> Διάβασμα QR </font></p>

<canvas id="qr-canvas" width="640" height="480" style="display:none"></canvas>

	<div id="result" >  Αποτέλεσμα εδώ </div>
	
<div id="outdiv" >
</div>

</body>
</html>