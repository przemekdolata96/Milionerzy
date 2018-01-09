<?php 
	header("application/json; charset=utf-8");
	session_name("mysession"); 
	session_start();
	
	if(isset($_SESSION['login'])){
		$idplayer=(int)$_SESSION['userid'];
		require_once("dbconnect.php");

		$sqlselect = "SELECT games FROM gracze WHERE idplayer=$idplayer";
		$result = $connection->query($sqlselect);
		$row = $result->fetch_assoc();
		$games=(int)$row["games"]+1;
		
		$sqlupdate="UPDATE  gracze SET games=$games WHERE idplayer=$idplayer";

		if ($connection->query($sqlupdate) === TRUE) {
	    	echo "New record created successfully";
		} 
		else {
	   	 echo "Error: " . $sql . "<br>" . $connection->error;
		}

		$connection->close();
	}
 ?>