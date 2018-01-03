<?php 
	header("application/json; charset=utf-8");
	session_name("mysession"); 
	session_start();
	require_once("dbconnect.php");
	if(!isset($_SESSION['login'])){
		header("Location: index.php");	
	}
	$idplayer=(int)$_SESSION['userid'];
	$query="SELECT idgame,result FROM rezultaty WHERE idplayer=$idplayer";
	/*$result=mysqli_query($connection,$query);
	$resultString = mysqli_fetch_assoc($result);*/

	$result = $connection->query($query);
	$money=['500','1000','2000','5000','10000','20000','40000','75000','125000','250000','500000','1000000'];

	/*if ($result->num_rows <= 0) {
	    // output data of each row
	    echo "Brak wyników";
	}*/
 ?>

 <!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Rejestracja</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
    	h1{
    		text-align: center;
    	}
    </style>
</head>
<body>
	<h1>Lista Twoich Wyników</h1>
	<table class="table">
	 
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Numer gry w systemie</th>
	      <th scope="col">Wynik</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $id=1; while($row = $result->fetch_assoc()) {?>
		  	 <tr>
		      <th scope="row"><?php echo $id++; ?></th>
		      <td><?php echo $row["idgame"] ?></td>
		      <td><?php echo $row["result"] ?></td>
		    </tr>
		 <?php }?>
	  </tbody>
	</table>


	<?php
		$connection->close();
	 ?>
</body>
</html>