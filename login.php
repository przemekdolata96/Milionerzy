<?php 
	include("dbconnect.php");
	session_name("mysession"); 
	session_start();
	$email='';
	$password='';

	$emailError='';
	$passwordError='';

	if(isset($_SESSION['login'])){
		session_destroy();
		header("Location: index.php");
	}

	if (isset($_POST['send'])) {
		$email=$_POST['email'];
		$password=$_POST['password'];

		if(!$email){
			$emailError="Wpisz login";
		}
		if(!$password){
			$passwordError="Wpisz hasło";
		}

		if($email && $password){
			$sql = "SELECT idplayer,name FROM gracze WHERE login='$email' AND password='$password'";
			$result = $connection->query($sql);
			$result = mysqli_query($connection, $sql);
			$resultString = mysqli_fetch_assoc($result);
			if (mysqli_num_rows($result) > 0) {
				$_SESSION['userid']=(int)implode($resultString);
				$_SESSION['login']="login";
			    header("Location: index.php");
			} else {
				echo "bad login data";
			}
		}


	}

 ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Rejestracja</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="form-row justify-content-center">
    <div class="form-group col-md-6 col-xs-12">
    	<?php if ( $emailError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $emailError; ?>
				</span>
			</div>
		<?php } ?>
      <label for="inputemail4">Login</label>
      <input type="text" class="form-control" id="inputemail4" name="email" placeholder="Login">
    </div>
  </div>
  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
		<?php if ( $passwordError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $passwordError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Hasło</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="hasło">
    </div>
  </div> 
  
  <div class="form-row justify-content-center">
  	<button type="submit" class="btn btn-primary" name="send">Zaloguj</button>
  </div>
   <div class="row">/</div>
  <a href="register.php"><div class="form-row justify-content-center">
  		Zarejestruj się
  	</div></a>
</form>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>