<?php
	function connect(){
		$dbserver = "localhost";
		$username = "root";
		$password = "";
		$dbname = "icspro";
		
		$link = mysqli_connect($dbserver, $username, $password, $dbname);
		//or die("Could not connect");
		return $link;
	}
	
	function setData($sql){
		$link = connect();
		if(mysqli_query($link,$sql)){
			return true;
		}
		else{
			//$err = $link->error;
			return false;
			// false;
			
		}
	}

	function getData($sql){
		$link = connect();
		$result = mysqli_query($link,$sql);
		$rowData = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$rowData[]= $row;
		}
		return $rowData;
		
	}
?>






