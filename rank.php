<?php 
	header("application/json; charset=utf-8");
	session_name("mysession"); 
	session_start();
	require_once("dbconnect.php");
	if(!isset($_SESSION['login'])){
		header("Location: index.php");	
	}
	$idplayer=(int)$_SESSION['userid'];
	$query="SELECT login,games,points FROM gracze ORDER BY points DESC";
	/*$result=mysqli_query($connection,$query);
	$resultString = mysqli_fetch_assoc($result);*/

	$result = $connection->query($query);


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
	      <th scope="col">Nazwa gracza</th>
	      <th scope="col">Liczba rozegranych gier</th>
	      <th scope="col">Punkty</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $id=1; while($row = $result->fetch_assoc()) {?>
		  	 <tr>
		      <th scope="row"><?php echo $id++; ?></th>
		      <td><?php echo $row["login"] ?></td>
		      <td><?php echo $row["games"] ?></td>
		      <td><?php echo $row["points"] ?></td>
		    </tr>
		 <?php }?>
	  </tbody>
	</table>
	<a href="http://localhost/milionerzy"><div class="form-row justify-content-center">
  		Strona główna
  	</div></a>


	<?php
		$connection->close();
	 ?>
</body>
</html>