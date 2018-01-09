<?php 
	include("dbconnect.php");

	$email='';
	$password='';
	$confirmPassword='';
	$name='';

	$emailError='';
	$passwordError='';
	$confirmPasswordError='';
	$nameError='';

	if(isset($_SESSION['login'])){
		header("Location: index.php");
	}

	if (isset($_POST['send'])) {
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirmPassword=$_POST['confirmPassword'];
		$name=$_POST['name'];

		if(!$email){
			$emailError="Niepoprawna lub zajęta nazwa użytkownika";
		}
		if(!$password){
			$passwordError="Niepoprawne hasło";
		}
		if($password!=$confirmPassword){
			$confirmPasswordError ="Hasła nie sa identyczne";
		}
		if(!$name){
			$nameError="Proszę wpisać imię";
		}

			if($email && $password==$confirmPassword && $name){
			$sql = "INSERT INTO gracze (login, password, name) VALUES ('$email', '$password','$name')";
				if ($connection->query($sql) === TRUE) {
    				echo "New record created successfully";
				} else {
    				echo "connection error";
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
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="fontello-696ac1d6/css/fontello.css">
	<link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
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
    <div class="form-group col-md-6 col-xs-12">
   		 <?php if ( $confirmPasswordError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $confirmPasswordError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Potwierdź hasło</label>
      <input type="password" class="form-control" id="inputPassword4" name="confirmPassword" placeholder="hasło">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-6 col-xs-12">
    	<?php if ( $nameError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $nameError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputName">Imię</label>
      <input type="text" class="form-control" id="inputName" name="name" placeholder="imię">
    </div>
  </div>

  <div class="form-row justify-content-center">
  	<button type="submit" class="btn btn-primary" name="send">Zarejestruj</button>
  </div>
    <div class="row">/</div>
  <a href="login.php"><div class="form-row justify-content-center">
  		Zaloguj się
  	</div></a>
  	<a href="http://localhost/milionerzy"><div class="form-row justify-content-center">
  		Strona główna
  	</div></a>
</form>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>