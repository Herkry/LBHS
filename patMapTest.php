<?php
//require("phpsqlajax_dbinfo.php");

$dbserver = "localhost";
$username = "root";
$password = "";
$dbname = "icspro";

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

$query = "SELECT  doctor.docFname, doctor.docLname, doctor.docPhone, doctor.docSpecialty, hospital.hospName, hospital.hospAddress, hospital.hospOpeningHrs, hospital.hospClosingHrs, hospital.hospLat, hospital.hospLong 
FROM doctor 
INNER JOIN hospital ON doctor.hospId = hospital.hospId"; 



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
  $newnode->setAttribute("docFname",$row['docFname']);
  $newnode->setAttribute("docLname",$row['docLname']);
  $newnode->setAttribute("docPhone", $row['docPhone']);
  $newnode->setAttribute("docSpecialty", $row['docSpecialty']);
  $newnode->setAttribute("hospName", $row['hospName']);
  $newnode->setAttribute("hospAddress", $row['hospAddress']);
  $newnode->setAttribute("hospOpeningHrs", $row['hospOpeningHrs']);
  $newnode->setAttribute("hospClosingHrs", $row['hospClosingHrs']);
  $newnode->setAttribute("hospLat", $row['hospLat']);
  $newnode->setAttribute("hospLong", $row['hospLong']);

}

$dom->save('hospital_maps.xml');
echo $dom->saveXML();

header("location: /LBHS/Hospital_Admin/dashboard.php");

?>