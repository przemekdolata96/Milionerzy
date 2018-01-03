<?php 
	header("application/json; charset=utf-8");
	session_name("mysession"); 
	session_start();
	
	if(isset($_SESSION['login'])){
		$idplayer=(int)$_SESSION['userid'];
		require_once("dbconnect.php");
		$result=$_POST['result'];
		$sql="INSERT INTO rezultaty(idplayer,result) VALUES ($idplayer,$result)";

		if ($connection->query($sql) === TRUE) {
	    	echo "New record created successfully";
		} 
		else {
	   	 echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$connection->close();
	}
 ?>

