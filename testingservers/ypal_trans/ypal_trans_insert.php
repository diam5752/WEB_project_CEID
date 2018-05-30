<?php
 include('ypal_trans_session.php');

$track = $_GET['tracking'];
$topoth = $_GET['top'];

$sql = "UPDATE parakolouthisi SET ARRIVED = 1 WHERE TRACKING = '".$track."' AND TOPOTHESIES = '".$topoth."'";
mysqli_set_charset($db,'utf8');
 $result = mysqli_query($db, $sql);  

//Check an kai oi proigoumenes topothesies exoun enhmerwthei sto ARRIVED (an kapios proigoumenos ypalilos ksexase na kanei scan)
$sql0 = "SELECT FAKE_ID FROM parakolouthisi WHERE TRACKING = '".$track."' AND TOPOTHESIES = '".$topoth."'";
mysqli_set_charset($db,'utf8');
$result0 = mysqli_query($db,$sql0);
$id = mysqli_fetch_array($result0,MYSQLI_ASSOC);
$id_here = $id["FAKE_ID"];

$sql = "UPDATE parakolouthisi SET ARRIVED = 1 WHERE TRACKING = '".$track."' AND FAKE_ID < '".$id_here."' AND ARRIVED = 0 ";
mysqli_set_charset($db,'utf8');
$result = mysqli_query($db,$sql);
?>

<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php include('ypal_trans_menu.php'); ?>
</head>

<body onload="load()">

<p>Η καταχώρηση έγινε!</p>
<br><br>
<a href='ypal_trans_welcome.php' class='btn btn-default'>Επιστροφή</a>
</div>

</body>
</html>