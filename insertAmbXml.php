<?php
//require("phpsqlajax_dbinfo.php");

$dbserver = "localhost";
$username = "root";
$password = "";
$dbname = "icspro3";

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection = mysqli_connect($dbserver, $username, $password,$dbname);

// Set the active MySQL database

$db_selected = mysqli_select_db($connection, $dbname);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error($connection));
}

// Select all the rows in the markers table

$query = "SELECT * FROM ambulance WHERE ambStatus = 'available';"; 



$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

//header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("ambId",$row['ambId']);
  $newnode->setAttribute("ambNoPlate",$row['ambNoPlate']);
  $newnode->setAttribute("ambType", $row['ambType']);
  $newnode->setAttribute("ambDriverName", $row['ambDriverName']);
  $newnode->setAttribute("ambDriverPhone", $row['ambDriverPhone']);
  $newnode->setAttribute("ambCapacity", $row['ambCapacity']);
  $newnode->setAttribute("ambEmail", $row['ambEmail']);
  $newnode->setAttribute("ambStatus", $row['ambStatus']);
  $newnode->setAttribute("ambLat", $row['ambLat']);
  $newnode->setAttribute("ambLong", $row['ambLong']);

}

$dom->save('ambDetails.xml');
echo $dom->saveXML();

header("location: /LBHS/Hospital_Admin/dashboard.php");

?>