<?php 
	include("dbconnect.php");
	session_name("mysession"); 
	session_start();
	if(!isset($_SESSION['login'])){
		header("Location: index.php");	
	}
	$question='';
	$answer1='';
	$answer2='';
	$answer3='';
	$answer4='';
	$correct='';
	$level='';

	$questionError='';
	$answerError='';


	if (isset($_POST['send'])) {

		$question=$_POST['question'];
		$answer1=$_POST['answer1'];
		$answer2=$_POST['answer2'];
		$answer3=$_POST['answer3'];
		$answer4=$_POST['answer4'];
		$correct=$_POST['correct'];
		$level=$_POST['level'];
		
		if(!$question || !$answer1 || !$answer2 || !$answer3 || !$answer4 || !$correct || !$level ){
			$questionError="Uzupełnij pole";
			$answerError='Uzupełnij pole';
		}
		
		if($question && $answer1 && $answer2 && $answer3 && $answer4){
			$queryRandom="SELECT COUNT(id) FROM pytania WHERE questionNumber='$level'";
			$result=mysqli_query($connection,$queryRandom);
			$resultString = mysqli_fetch_assoc($result);
			$questionOnLevelNumber=(int)implode($resultString);
			$userid =(int)$_SESSION['userid'];
			$sql = "INSERT INTO pytania (question, answerA, answerB,answerC,answerD,correct,questionNumber,random,idgracza) VALUES ('$question', '$answer1','$answer2','$answer3','$answer4','$correct','$level',$questionOnLevelNumber,$userid)";
				if ($connection->query($sql) === TRUE) {
    				echo "New record created successfully";
				} else {
    				echo "connection error";
				}
		}
		/*if(!$name){
			$nameError="Proszę wpisać imię";
		}

			if($question && $password==$confirmPassword && $name){
			$sql = "INSERT INTO gracze (login, password, name) VALUES ('$question', '$password','$name')";
				if ($connection->query($sql) === TRUE) {
    				echo "New record created successfully";
				} else {
    				echo "connection error";
				}
		}
*/

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
    	<?php if ( $questionError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $questionError; ?>
				</span>
			</div>
		<?php } ?>
      <label for="inputemail4">Pytanie</label>
      <input type="text" class="form-control" id="inputemail4" name="question" placeholder="Pytanie">
    </div>
  </div>
  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
		<?php if ( $answerError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $answerError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Odpowiedź A:</label>
      <input type="text" class="form-control" id="inputPassword4" name="answer1" placeholder="odpowiedz A">
    </div>
  </div> 

  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
		<?php if ( $answerError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $answerError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Odpowiedź B:</label>
      <input type="text" class="form-control" id="inputPassword4" name="answer2" placeholder="odpowiedz B">
    </div>
  </div> 

  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
		<?php if ( $answerError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $answerError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Odpowiedź C:</label>
      <input type="text" class="form-control" id="inputPassword4" name="answer3" placeholder="odpowiedz C">
    </div>
  </div> 

  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
		<?php if ( $answerError != null ) { ?>
			<div class="form-row"> 
				<span class="badge badge-danger">
					<?php echo $answerError; ?>
				</span>
			</div>
		<?php } ?>	
      <label for="inputPassword4">Odpowiedź D:</label>
      <input type="text" class="form-control" id="inputPassword4" name="answer4" placeholder="odpowiedz D">
    </div>
  </div> 

	<div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
      <label >Poprawna odpowiedź na twoje pytanie:</label>
       <select class="custom-select d-block my-3" required name="correct">s
	    <option value="a">A</option>
	    <option value="b">B</option>
	    <option value="c">C</option>
	    <option value="d">D</option>
	  </select>
    </div>
  </div> 

  <div class="form-row justify-content-center">
   	<div class="form-group col-md-6 col-xs-12">
      <label >Poziom Pytania</label>
       <select class="custom-select d-block my-3" required name="level">s
	    <option value="0">1</option>
	    <option value="1">2</option>
	    <option value="2">3</option>
	    <option value="3">4</option>
	    <option value="4">5</option>
	    <option value="5">6</option>
	    <option value="6">7</option>
	    <option value="7">8</option>
	    <option value="8">9</option>
	    <option value="9">10</option>
	    <option value="10">11</option>
	    <option value="11">12</option>
	  </select>
    </div>
  </div> 

  <div class="form-row justify-content-center">
  	<button type="submit" class="btn btn-primary" name="send">Dodaj pytanie</button>
  </div>
</form>
<a href="http://localhost/milionerzy"><div class="form-row justify-content-center">
  		Strona główna
  	</div></a>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>