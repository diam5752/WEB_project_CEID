<?php

require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);

return $xmlStr;
}


$connection=mysqli_connect("localhost","root","","project");
// Check connection
if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_set_charset($connection,'utf8');
// Select all the rows in the markers table
$query = "SELECT * FROM katasthmata WHERE 1";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Λάθος query: ' . mysqli_error());
}


//header("Content-type: text/xml");
//header('Content-Type: text/plain');

$myfile = fopen("katasthmata.xml", "w") or die("Unable to open file!");

// Start XML file, echo parent node
$txt = "<kat>";
fwrite($myfile, $txt);
// Iterate through the rows, printing XML nodes for each
while ($row=mysqli_fetch_assoc($result)){
  // Add to XML document node
  $txt =  "\n<katasthmata ";
 fwrite($myfile, $txt);
  $txt = 'TRANS_ID="' . $row['TRANS_ID'] . '" ';
 fwrite($myfile, $txt);
  $txt = 'ODOS="' . parseToXML($row['ODOS']) . '" ';
 fwrite($myfile, $txt);
  $txt = 'ONOMA="' . parseToXML($row['ONOMA']) . '" ';
 fwrite($myfile, $txt);
  $txt =  'ARITHMOS="' . $row['ARITHMOS'] . '" ';
 fwrite($myfile, $txt);
  $txt = 'POLI="' . $row['POLI'] . '" ';
 fwrite($myfile, $txt);
  $txt = 'COORX="' . $row['COORX'] . '" ';
 fwrite($myfile, $txt);
  $txt = 'COORY="' . $row['COORY'] . '" ';
 fwrite($myfile, $txt);
 $txt = 'TILEFONO="' . $row['TILEFONO'] . '" ';
 fwrite($myfile, $txt);
 $txt = 'TK="' . $row['TK'] . '" ';
 fwrite($myfile, $txt);
  $txt = '/>';
 fwrite($myfile, $txt);
}

// Select all the rows in the markers table

//header("Content-type: text/xml");
//header('Content-Type: text/plain');

// Start XML file, echo parent node
//$txt = "<katasthmata>";
//fwrite($myfile, $txt);
// Iterate through the rows, printing XML nodes for each


// End XML file
$txt = "\n </kat>";
fwrite($myfile, $txt);

fclose($myfile);
?>